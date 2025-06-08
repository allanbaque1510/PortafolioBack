<?php

namespace App\Services;

use App\Models\WorkExperienceTask;
use Illuminate\Http\Request;

class WorkExperienceTaskService
{
    public function getAll()
    {
        return WorkExperienceTask::orderBy('order')->get();
    }

    public function create(Request $request)
    {
        $data = onlyFillable(WorkExperienceTask::class,$request) ;
        return WorkExperienceTask::create($data);
    }

    public function update(WorkExperienceTask $workExperienceTask, array $data)
    {
        $workExperienceTask->update($data);
        return $workExperienceTask;
    }

    public function delete(WorkExperienceTask $workExperienceTask)
    {
        return $workExperienceTask->delete();
    }

    public function findOrFail($id)
    {
        return WorkExperienceTask::findOrFail($id);
    }
}
