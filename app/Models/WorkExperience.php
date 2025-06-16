<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $table = 'work_experience';

    protected $fillable = [
        'company_name', 'position', 'description', 'achievements',
        'start_date', 'end_date', 'is_current', 'company_logo',
        'company_website', 'company_location', 'language_id', 'status', 'order'
    ];

    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function tasks() {
        return $this->hasMany(WorkExperienceTask::class);
    }

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'work_experience_skills',  // tabla pivote
            'work_experience_id',      // FK en tabla pivote hacia WorkExperience
            'skill_id'                 // FK en tabla pivote hacia Skill
        )->withPivot('id', 'status', 'order') // si quieres acceder a estos campos
        ->withTimestamps() // si usas timestamps en pivote
        ->wherePivot('status', 1)   
        ->orderBy('work_experience_skills.order');
    }

}
