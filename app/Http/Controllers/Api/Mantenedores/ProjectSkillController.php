<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\ProjectSkillService;
use Illuminate\Http\Request;

class ProjectSkillController extends Controller
{
    protected $_projectSkillService;

    public function __construct(ProjectSkillService $_projectSkillService)
    {
        $this->_projectSkillService = $_projectSkillService;
    }
    public function index()
    {
        return response()->json($this->_projectSkillService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_projectSkillService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_projectSkillService->findOrFail($id);
        return response()->json($this->_projectSkillService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_projectSkillService->findOrFail($id);
        $this->_projectSkillService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
