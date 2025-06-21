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
            'achievements' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'company_website' => 'nullable|url|max:255',
            'company_location' => 'nullable|string|max:255',
            'language_id' => 'required|integer',
            'status' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = asset(Storage::url($logoPath));
        }

        if ($request->boolean('is_current')) {
            $validatedData['end_date'] = null;
        }

        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status');
        $validatedData['is_current'] = $request->boolean('is_current');
        return WorkExperience::create($validatedData);
    }

    public function update(Request $request,WorkExperience $workExperience)
    {
         $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'achievements' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_current' => 'boolean',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'company_website' => 'nullable|url|max:255',
            'company_location' => 'nullable|string|max:255',
            'language_id' => 'required|integer',
            'status' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Manejo de la imagen: si hay una nueva, se sube y se elimina la vieja
        if ($request->hasFile('company_logo')) {
            if ($workExperience->company_logo) {
                Storage::disk('public')->delete(rutaRelativa($workExperience->company_logo));
            }
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
            $validatedData['company_logo'] = asset(Storage::url($logoPath));

        } elseif ($request->boolean('remove_logo')) {
            if ($workExperience->company_logo) {
                Storage::disk('public')->delete(rutaRelativa($workExperience->company_logo));
            }
            $validatedData['company_logo'] = null;
        } else {
            unset($validatedData['company_logo']);
        }

        // Si "is_current" es true, establecer end_date a null
        if ($request->boolean('is_current')) {
            $validatedData['end_date'] = null;
        }

        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status');
        $validatedData['is_current'] = $request->boolean('is_current');

        $workExperience->update($validatedData);
        
        return $workExperience;
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
