<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsService
{
    public function getAll()
    {
        return Project::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Project::class,$request) ;
        return Project::create($data);
    }

    public function update(Project $project, array $data)
    {
        $project->update($data);
        return $project;
    }

    public function delete(Project $project)
    {
        return $project->delete();
    }

    public function findOrFail($id)
    {
        return Project::findOrFail($id);
    }
}
