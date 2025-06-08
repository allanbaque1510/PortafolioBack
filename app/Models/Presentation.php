<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $table = 'presentations';

    protected $fillable = [
        'title', 'content', 'image', 'video_url', 'type',
        'language_id', 'status', 'order'
    ];

    public $timestamps = true;

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function projects() {
        return $this->hasMany(Project::class);
}

}
