<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['title', 'description', 'image', 'url', 'icon', 'language_id', 'status', 'order'];

    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }

}
