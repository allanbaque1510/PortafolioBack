<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{

    protected $table = 'project_category';

    protected $fillable = ['project_id', 'category_id', 'status', 'order'];

    public $timestamps = true;
    public function project() {
        return $this->belongsTo(Project::class, 'proyect_id');
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
