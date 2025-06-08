<?php

namespace App\Services;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageService
{
    public function getAll()
    {
        return Language::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(Language::class,$request) ;
        return Language::create($data);
    }

    public function update(Language $language, array $data)
    {
        $language->update($data);
        return $language;
    }

    public function delete(Language $language)
    {
        return $language->delete();
    }

    public function findOrFail($id)
    {
        return Language::findOrFail($id);
    }
}
