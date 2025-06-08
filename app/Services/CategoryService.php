<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public function getAll()
    {
        return Category::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Category::class,$request) ;
        return Category::create($data);
    }

    public function update(Category $category, array $data)
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }

    public function findOrFail($id)
    {
        return Category::findOrFail($id);
    }
}
