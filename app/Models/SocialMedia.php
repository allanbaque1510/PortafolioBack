<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $table = 'social_media';

    protected $fillable = [
        'platform', 'url', 'icon', 'background_color', 'text_color',
        'hover_color', 'hover_background_color', 'language_id', 'status', 'order'
    ];

    public $timestamps = true;
    public function language() {
        return $this->belongsTo(Language::class);
    }

}

