<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'slug',
    ];

    protected static function booted()
    {
        static::creating(function (Post $post) {
            $post->slug = str($post->name)->slug();
        });

        static::updating(function (Post $post) {
            $post->slug = str($post->name)->slug();
        });
    }
}
