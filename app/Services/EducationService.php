<?php

namespace App\Services;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationService
{
    public function getAll()
    {
        return Education::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Education::class,$request) ;
        return Education::create($data);
    }

    public function update(Education $education, array $data)
    {
        $education->update($data);
        return $education;
    }

    public function delete(Education $education)
    {
        return $education->delete();
    }

    public function findOrFail($id)
    {
        return Education::findOrFail($id);
    }
}
