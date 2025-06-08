<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\WorkExperienceTaskService;
use Illuminate\Http\Request;

class WorkExperienceTaskController extends Controller
{
    protected $_workExperienceTaskService;

    public function __construct(WorkExperienceTaskService $_workExperienceTaskService)
    {
        $this->_workExperienceTaskService = $_workExperienceTaskService;
    }
    public function index()
    {
        return response()->json($this->_workExperienceTaskService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_workExperienceTaskService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_workExperienceTaskService->findOrFail($id);
        return response()->json($this->_workExperienceTaskService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_workExperienceTaskService->findOrFail($id);
        $this->_workExperienceTaskService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
