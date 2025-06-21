<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use App\Services\WorkExperienceService;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    protected $_workExperienceService;

    public function __construct(WorkExperienceService $_workExperienceService)
    {
        $this->_workExperienceService = $_workExperienceService;
    }
    public function index()
    {
        $workExperiences = $this->_workExperienceService->getAll();
        return view('admin.work-experience.index', compact('workExperiences'));
    }
    public function create()
    {
        return view('admin.work-experience.create');
    }

    public function store(Request $request)
    {
        $this->_workExperienceService->store($request);
        return redirect()->route('admin.work-experience.index')->with('success', 'Experiencia laboral creada exitosamente.');
    }

    public function edit(WorkExperience $workExperience)
    {
        return view('admin.work-experience.edit', compact('workExperience'));
    }


    public function update(Request $request, WorkExperience $workExperience)
    {
        $this->_workExperienceService->update($request, $workExperience);
        return redirect()->route('admin.work-experience.index')->with('success', 'Experiencia laboral actualizada exitosamente.');
    }

    public function destroy(WorkExperience $work_experience)
    {
        $this->_workExperienceService->destroy($work_experience);
        return redirect()->route('admin.work-experience.index')->with('success', 'Experiencia laboral eliminada exitosamente.');
    }
}
