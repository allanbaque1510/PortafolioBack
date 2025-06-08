<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\ProjectsService;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    protected $_projectsService;

    public function __construct(ProjectsService $_projectsService)
    {
        $this->_projectsService = $_projectsService;
    }
    public function index()
    {
        return response()->json($this->_projectsService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_projectsService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_projectsService->findOrFail($id);
        return response()->json($this->_projectsService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_projectsService->findOrFail($id);
        $this->_projectsService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
