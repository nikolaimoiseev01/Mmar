<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function postTopic() {
        return $this->belongsTo(PostTopic::class);
    }

    protected $casts = [
        'content' => 'array',
        'custom_created_at' => 'datetime:Y-m-d',
    ];
}
