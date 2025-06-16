<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionService
{
    public function getAll()
    {
        return Section::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Section::class,$request) ;
        return Section::create($data);
    }

    public function update(Section $section, array $data)
    {
        $section->update($data);
        return $section;
    }

    public function delete(Section $section)
    {
        return $section->delete();
    }

    public function findOrFail($id)
    {
        return Section::findOrFail($id);
    }
}
