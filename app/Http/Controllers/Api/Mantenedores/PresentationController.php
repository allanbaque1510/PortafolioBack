<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\PresentationService;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    protected $_presentationService;

    public function __construct(PresentationService $_presentationService)
    {
        $this->_presentationService = $_presentationService;
    }
    public function index()
    {
        return response()->json($this->_presentationService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_presentationService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_presentationService->findOrFail($id);
        return response()->json($this->_presentationService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_presentationService->findOrFail($id);
        $this->_presentationService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
