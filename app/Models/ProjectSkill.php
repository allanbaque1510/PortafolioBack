<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    protected $table = 'project_skills';

    protected $fillable = ['project_id', 'skill_id', 'status', 'order'];

    public $timestamps = true;
    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function skill() {
        return $this->belongsTo(Skill::class);
    }

}
