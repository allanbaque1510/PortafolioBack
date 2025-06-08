<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = ['name', 'description', 'slug', 'icon', 'start_date', 'language_id', 'status', 'order'];

    public $timestamps = true;

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function projectSkills() {
        return $this->hasMany(ProjectSkill::class, 'skill_id');
    }

    public function workExperienceSkills() {
        return $this->hasMany(WorkExperienceSkill::class, 'skill_id');
    }

}

