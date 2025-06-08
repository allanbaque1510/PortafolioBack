<?php

namespace App\Http\Controllers\Api\Mantenedores;


use App\Http\Controllers\Controller;
use App\Services\LanguageService;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $_languageService;

    public function __construct(LanguageService $_languageService)
    {
        $this->_languageService = $_languageService;
    }
    public function index()
    {
        return response()->json($this->_languageService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_languageService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_languageService->findOrFail($id);
        return response()->json($this->_languageService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_languageService->findOrFail($id);
        $this->_languageService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
