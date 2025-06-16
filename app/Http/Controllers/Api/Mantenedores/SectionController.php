<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $_sectionService;

    public function __construct(SectionService $_sectionService)
    {
        $this->_sectionService = $_sectionService;
    }
    public function index()
    {
        return response()->json($this->_sectionService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_sectionService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_sectionService->findOrFail($id);
        return response()->json($this->_sectionService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_sectionService->findOrFail($id);
        $this->_sectionService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
