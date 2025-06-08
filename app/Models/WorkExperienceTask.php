<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperienceTask extends Model
{
    protected $table = 'work_experience_tasks';

    protected $fillable = [
        'work_experience_id', 'title', 'description', 'language_id', 'status', 'order'
    ];

    public $timestamps = true;

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function workExperience() {
        return $this->belongsTo(WorkExperience::class);
    }

}
