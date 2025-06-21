<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceService
{
    public function getAll()
    {
        return Service::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
          $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'url' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:255', // Opcional si es una clase o SVG
            'language_id' => 'required|integer',
            'status' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $validatedData['image'] = asset(Storage::url($imagePath));
        }
        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status');

        return Service::create($validatedData);
    }
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'url' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:255',
            'language_id' => 'required|integer',
            'status' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete(rutaRelativa($service->image));
            }
            $imagePath = $request->file('image')->store('services', 'public');
            $validatedData['image'] = asset(Storage::url($imagePath));
        } elseif ($request->boolean('remove_image')) {
            if ($service->image) {
                Storage::disk('public')->delete(rutaRelativa($service->image));
            }
            $validatedData['image'] = null;
        } else {
            unset($validatedData['image']);
        }

        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status');
        $service->update($validatedData);
        return $service;
    }

    
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete(rutaRelativa($service->image));
        }
        $service->delete();
        return true;
    }

    public function findOrFail($id)
    {
        return Service::findOrFail($id);
    }
}
