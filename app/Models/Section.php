<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
        'icon',
        'language_id',
        'status',
        'order'
    ];

    public $timestamps = true;

    public function language() {
        return $this->belongsTo(Language::class);
    }

}
