<?php

namespace App\Services;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaService
{
    public function getAll()
    {
        return SocialMedia::orderBy('order')->get();
    }

    public function create(Request $request)
    {
        $data = onlyFillable(SocialMedia::class,$request) ;
        return SocialMedia::create($data);
    }

    public function update(SocialMedia $socialMedia, array $data)
    {
        $socialMedia->update($data);
        return $socialMedia;
    }

    public function delete(SocialMedia $socialMedia)
    {
        return $socialMedia->delete();
    }

    public function findOrFail($id)
    {
        return SocialMedia::findOrFail($id);
    }
}
