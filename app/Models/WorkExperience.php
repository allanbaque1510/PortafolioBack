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

    public function skills() {
        return $this->hasMany(WorkExperienceSkill::class);
    }

}
