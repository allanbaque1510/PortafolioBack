<?php

namespace App\Services;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkExperienceService
{
    public function getAll()
    {
        return WorkExperience::orderBy('order')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'achievements' => 'nullable|string', // Corrected: Made nullable as per form
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // Corrected: Made nullable as per form
            'company_website' => 'nullable|url|max:255',
            'company_location' => 'nullable|string|max:255',
            'language_id' => 'required|integer', // Added: exists rule
            'status' => 'boolean',
            'order' => 'nullable|integer|min:0', // Added: min:0
        ]);

  

        if ($request->hasFile('company_logo')) {
            $imagePath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = asset(Storage::url($imagePath));
        }


        // If "is_current" is true, set end_date to null
        if ($request->boolean('is_current')) {
            $validatedData['end_date'] = null;
        }

        // Ensure order, status, and is_current are correctly cast as per request input
        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status');
        $validatedData['is_current'] = $request->boolean('is_current');

        return WorkExperience::create($validatedData);
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'achievements' => 'nullable|string', // Corrected: Made nullable as per form
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'company_website' => 'nullable|url|max:255',
            'company_location' => 'nullable|string|max:255',
            'language_id' => 'required|integer', // Added: exists rule
            'status' => 'boolean',
            'order' => 'nullable|integer|min:0', // Added: min:0
        ]);

        
        // Manejo de la imagen: si hay una nueva, se sube y se elimina la vieja
        if ($request->hasFile('company_logo')) {
            if ($workExperience->company_logo) {
                Storage::disk('public')->delete(rutaRelativa($workExperience->company_logo));
            }
            $imagePath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = asset(Storage::url($imagePath));
        }else {
            // Si no se subió una nueva imagen y no se pidió eliminar, conservar la existente
            unset($validatedData['company_logo']); // Evita que 'image' se establezca en null si no se envió nada
        }


        // If "is_current" is true, set end_date to null
        if ($request->boolean('is_current')) {
            $validatedData['end_date'] = null;
        }

        // Ensure order, status, and is_current are correctly cast as per request input
        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status');
        $validatedData['is_current'] = $request->boolean('is_current');

        $workExperience->update($validatedData);

        return $workExperience; // Keeping your original return
    }

    public function destroy(WorkExperience $workExperience)
    {
        if ($workExperience->company_logo) {
            Storage::disk('public')->delete(rutaRelativa($workExperience->company_logo));
        }
        $workExperience->delete();
        return true;
    }

}
