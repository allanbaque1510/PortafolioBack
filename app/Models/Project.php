<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title', 'description', 'url', 'image',
        'start_date', 'end_date',
        'first_label',
        'first_url_gihub',
        'second_label',
        'second_url_gihub',
        'language_id', 'status', 'order'
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function category() {
        return $this->hasMany(ProjectCategory::class,'project_id');
    }


    public function projectSkills() {
        return $this->hasMany(ProjectSkill::class, 'project_id');
    }

}
