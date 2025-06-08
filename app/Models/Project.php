<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'title', 'description', 'url', 'image', 'github_url',
        'start_date', 'end_date', 'category_id', 'presentation_id',
        'language_id', 'status', 'order'
    ];

    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function presentation() {
        return $this->belongsTo(Presentation::class);
    }

    public function projectSkills() {
        return $this->hasMany(ProjectSkill::class, 'proyect_id');
    }

}
