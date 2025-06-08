<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\PersonalInformationService;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{ 
    protected $_personalInformationService;

    public function __construct(PersonalInformationService $_personalInformationService)
    {
        $this->_personalInformationService = $_personalInformationService;
    }
    public function index()
    {
        return response()->json($this->_personalInformationService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_personalInformationService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_personalInformationService->findOrFail($id);
        return response()->json($this->_personalInformationService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_personalInformationService->findOrFail($id);
        $this->_personalInformationService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
