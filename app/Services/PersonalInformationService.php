<?php

namespace App\Services;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationService
{
    public function getAll()
    {
        return PersonalInformation::orderBy('order')->get();
    }
    
    public function create(Request $request)
    {
        $data = onlyFillable(PersonalInformation::class,$request) ;
        return PersonalInformation::create($data);
    }

    public function update(PersonalInformation $personalInformation, array $data)
    {
        $personalInformation->update($data);
        return $personalInformation;
    }

    public function delete(PersonalInformation $personalInformation)
    {
        return $personalInformation->delete();
    }

    public function findOrFail($id)
    {
        return PersonalInformation::findOrFail($id);
    }
}
