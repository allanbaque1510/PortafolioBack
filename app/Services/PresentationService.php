<?php

namespace App\Services;

use App\Models\Presentation;
use Illuminate\Http\Request;

class PresentationService
{
    public function getAll()
    {
        return Presentation::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Presentation::class,$request) ;
        return Presentation::create($data);
    }

    public function update(Presentation $presentation, array $data)
    {
        $presentation->update($data);
        return $presentation;
    }

    public function delete(Presentation $presentation)
    {
        return $presentation->delete();
    }

    public function findOrFail($id)
    {
        return Presentation::findOrFail($id);
    }
}
