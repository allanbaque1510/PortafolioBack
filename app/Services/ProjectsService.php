<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsService
{
    public function getAll()
    {
        return Project::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
           $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', // longText en DB, textare en HTML
            'url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // Image is required
            'first_label' => 'nullable|string|max:255',
            'first_url_gihub' => 'nullable|url|max:255',
            'second_label' => 'nullable|string|max:255',
            'second_url_gihub' => 'nullable|url|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'language_id' => 'required|integer', // Asumiendo un ID de idioma válido
            'status' => 'boolean',
            'order' => 'nullable|integer',
            'skills' => 'nullable|array',
        ]);
        
        
        // Manejo de la imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $validatedData['image'] = asset(Storage::url($imagePath));
        }

        // Convertir 'order' a int o null si está vacío
        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status') ?? true;

        $project = Project::create($validatedData);

        if(isset($validatedData['skills'])) {
            $project->skillsData()->sync($validatedData['skills']);
            unset($validatedData['skills']);
        }
        
        return $project;
    }

    public function update(Project $project, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // Image can be null on update if old one is kept
            'first_label' => 'nullable|string|max:255',
            'first_url_gihub' => 'nullable|url|max:255',
            'second_label' => 'nullable|string|max:255',
            'second_url_gihub' => 'nullable|url|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'language_id' => 'required|integer',
            'status' => 'boolean',
            'order' => 'nullable|integer',
            'skills' => 'nullable|array',
        ]);
        
        if(isset($validatedData['skills'])) {
            $project->skillsData()->sync($validatedData['skills']);
            unset($validatedData['skills']);
        }
        // Manejo de la imagen: si hay una nueva, se sube y se elimina la vieja
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete(rutaRelativa($project->image));
            }
            $imagePath = $request->file('image')->store('projects', 'public');
            $validatedData['image'] = asset(Storage::url($imagePath));
        } elseif ($request->boolean('remove_image')) {
            if ($project->image) {
                Storage::disk('public')->delete(rutaRelativa($project->image));
            }
            $validatedData['image'] = null;
        } else {
            // Si no se subió una nueva imagen y no se pidió eliminar, conservar la existente
            unset($validatedData['image']); // Evita que 'image' se establezca en null si no se envió nada
        }

        // Convertir 'order' a int o null si está vacío
        $validatedData['order'] = $validatedData['order'] ?? 0;
        $validatedData['status'] = $request->boolean('status'); // Asegura que status sea booleano

        $project->update($validatedData);

        return $project;
    }

    public function delete(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete(rutaRelativa($project->image));
        }
        return $project->delete();
    }

    public function findOrFail($id)
    {
        return Project::findOrFail($id);
    }
}
