<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
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
        return response()->json($this->_workExperienceService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_workExperienceService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_workExperienceService->findOrFail($id);
        return response()->json($this->_workExperienceService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_workExperienceService->findOrFail($id);
        $this->_workExperienceService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
