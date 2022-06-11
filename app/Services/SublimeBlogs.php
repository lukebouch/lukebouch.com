<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SublimeBlogs
{
    public static function getPosts()
    {
        return cache()->remember('posts', 60, function () {
            return Http::withToken(config('services.sublime-blogs.key'))->get(config('services.sublime-blogs.endpoint') . '/posts')->collect('data');
        });
    }
}
