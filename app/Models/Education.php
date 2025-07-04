<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'institution', 'level', 'profession', 'start_date', 'end_date',
        'city', 'country', 'description', 'language_id', 'status', 'order'
    ];
     protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    public $timestamps = true;

    public function language() {
        return $this->belongsTo(Language::class);
    }
}

