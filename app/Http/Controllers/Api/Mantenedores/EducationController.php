<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\EducationService;
use Illuminate\Http\Request;

class EducationController extends Controller
{
   protected $_educationService;

    public function __construct(EducationService $_educationService)
    {
        $this->_educationService = $_educationService;
    }
    public function index()
    {
        return response()->json($this->_educationService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_educationService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_educationService->findOrFail($id);
        return response()->json($this->_educationService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_educationService->findOrFail($id);
        $this->_educationService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
