<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperienceSkill extends Model
{
    protected $table = 'work_experience_skills';

    protected $fillable = ['work_experience_id', 'skill_id', 'status', 'order'];

    public $timestamps = true;
    public function workExperience() {
        return $this->belongsTo(WorkExperience::class);
    }

    public function skill() {
        return $this->belongsTo(Skill::class);
    }

}

