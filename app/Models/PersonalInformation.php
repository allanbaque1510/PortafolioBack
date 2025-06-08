<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = 'personal_information';

    protected $fillable = [
        'name', 'lastname', 'identification', 'cellphone', 'email',
        'location', 'city', 'state', 'country', 'foto', 'fotoThumbrl',
        'cv_file', 'language_id', 'status', 'order'
    ];

    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }


}
