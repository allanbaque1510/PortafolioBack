<?php

namespace App\Services;

use App\Models\ProjectSkill;
use Illuminate\Http\Request;

class ProjectSkillService
{
    public function getAll()
    {
        return ProjectSkill::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(ProjectSkill::class,$request) ;
        return ProjectSkill::create($data);
    }

    public function update(ProjectSkill $projectSkill, array $data)
    {
        $projectSkill->update($data);
        return $projectSkill;
    }

    public function delete(ProjectSkill $projectSkill)
    {
        return $projectSkill->delete();
    }

    public function findOrFail($id)
    {
        return ProjectSkill::findOrFail($id);
    }
}
