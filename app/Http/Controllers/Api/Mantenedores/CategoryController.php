<?php

namespace App\Http\Controllers\Api\Mantenedores;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   protected $_categoriesService;

    public function __construct(CategoryService $_categoriesService)
    {
        $this->_categoriesService = $_categoriesService;
    }
    public function index()
    {
        return response()->json($this->_categoriesService->getAll());
    }

    public function store(Request $request)
    {
        return response()->json($this->_categoriesService->create($request));
    }

    public function update(Request $request, $id)
    {
        $social = $this->_categoriesService->findOrFail($id);
        return response()->json($this->_categoriesService->update($social, $request->all()));
    }

    public function destroy($id)
    {
        $social = $this->_categoriesService->findOrFail($id);
        $this->_categoriesService->delete($social);
        return response()->json(['message' => 'Deleted']);
    }
}
