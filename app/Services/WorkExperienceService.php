<?php

namespace App\Services;

use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceService
{
    public function getAll()
    {
        return WorkExperience::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(WorkExperience::class,$request) ;
        return WorkExperience::create($data);
    }

    public function update(WorkExperience $workExperience, array $data)
    {
        $workExperience->update($data);
        return $workExperience;
    }

    public function delete(WorkExperience $workExperience)
    {
        return $workExperience->delete();
    }

    public function findOrFail($id)
    {
        return WorkExperience::findOrFail($id);
    }
}
