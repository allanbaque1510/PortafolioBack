<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'slug', 'icon', 'language_id', 'status', 'order'];

    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function projects() {
        return $this->hasMany(ProjectCategory::class, 'category_id');
    }

}

