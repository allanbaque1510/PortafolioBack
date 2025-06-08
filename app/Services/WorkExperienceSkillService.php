<?php

namespace App\Services;

use App\Models\WorkExperienceSkill;
use Illuminate\Http\Request;

class WorkExperienceSkillService
{
    public function getAll()
    {
        return WorkExperienceSkill::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(WorkExperienceSkill::class,$request) ;
        return WorkExperienceSkill::create($data);
    }

    public function update(WorkExperienceSkill $workExperienceSkill, array $data)
    {
        $workExperienceSkill->update($data);
        return $workExperienceSkill;
    }

    public function delete(WorkExperienceSkill $workExperienceSkill)
    {
        return $workExperienceSkill->delete();
    }

    public function findOrFail($id)
    {
        return WorkExperienceSkill::findOrFail($id);
    }
}
