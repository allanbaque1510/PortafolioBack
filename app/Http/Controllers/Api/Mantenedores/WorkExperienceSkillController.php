<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\WorkExperienceSkillService;
use Illuminate\Http\Request;

class WorkExperienceSkillController extends Controller
{
    protected $_workExperienceSkillService;

    public function __construct(WorkExperienceSkillService $_workExperienceSkillService)
    {
        $this->_workExperienceSkillService = $_workExperienceSkillService;
    }
    public function index()
    {
        return response()->json($this->_workExperienceSkillService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_workExperienceSkillService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_workExperienceSkillService->findOrFail($id);
        return response()->json($this->_workExperienceSkillService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_workExperienceSkillService->findOrFail($id);
        $this->_workExperienceSkillService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
