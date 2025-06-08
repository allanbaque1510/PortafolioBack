<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\SkillService;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    protected $_skillService;

    public function __construct(SkillService $_skillService)
    {
        $this->_skillService = $_skillService;
    }
    public function index()
    {
        return response()->json($this->_skillService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_skillService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_skillService->findOrFail($id);
        return response()->json($this->_skillService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_skillService->findOrFail($id);
        $this->_skillService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
