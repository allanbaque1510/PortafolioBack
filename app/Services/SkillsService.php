<?php

namespace App\Services;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillService
{
    public function getAll()
    {
        return Skill::orderBy('order')->get();
    }

    public function create(Request $request)
    {
        $data = onlyFillable(Skill::class,$request) ;
        return Skill::create($data);
    }

    public function update(Skill $skill, array $data)
    {
        $skill->update($data);
        return $skill;
    }

    public function delete(Skill $skill)
    {
        return $skill->delete();
    }

    public function findOrFail($id)
    {
        return Skill::findOrFail($id);
    }
}
