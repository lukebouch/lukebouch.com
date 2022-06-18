<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SublimeBlogs
{
    protected String $endpoint;
    protected String $key;

    public function __construct(String $endpoint, String $key)
    {
        $this->endpoint = $endpoint;
        $this->key = $key;
    }

    public function getPosts()
    {
        return cache()->remember('posts', 60, function () {
            return Http::withToken($this->key)->get($this->endpoint . '/posts')->collect('data');
        });
    }
}
