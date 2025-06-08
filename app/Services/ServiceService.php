<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceService
{
    public function getAll()
    {
        return Service::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Service::class,$request) ;
        return Service::create($data);
    }

    public function update(Service $project, array $data)
    {
        $project->update($data);
        return $project;
    }

    public function delete(Service $project)
    {
        return $project->delete();
    }

    public function findOrFail($id)
    {
        return Service::findOrFail($id);
    }
}
