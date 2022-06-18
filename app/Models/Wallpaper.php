<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Wallpaper extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function isPublished()
    {
        return $this->published_at != null && $this->published_at <= now() ? true : false;
    }

    public function isNotPublished()
    {
        return !$this->isPublished();
    }
}
