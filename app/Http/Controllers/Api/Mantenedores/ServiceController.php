<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $_service;

    public function __construct(ServiceService $_service)
    {
        $this->_service = $_service;
    }
    public function index()
    {
        return response()->json($this->_service->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_service->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_service->findOrFail($id);
        return response()->json($this->_service->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_service->findOrFail($id);
        $this->_service->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
