<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProjectsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    protected $_projectsService;

    public function __construct(ProjectsService $_projectsService)
    {
        $this->_projectsService = $_projectsService;
    }
    public function index()
    {
        $projects = $this->_projectsService->getAll(); // Obtiene todos los proyectos
        return view('admin.projects.index', compact('projects'));
    }
    /**
     * Muestra el formulario para crear un nuevo proyecto.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $this->_projectsService->create($request);
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {
        $this->_projectsService->update($project,$request);
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $this->_projectsService->delete($project);
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }

}
