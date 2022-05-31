<?php

namespace App\Http\Controllers;

use App\Services\SublimeBlogs;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function rss()
    {
        return view('web.feeds.rss', [
            'posts' => SublimeBlogs::getPosts(),
        ]);
    }
}
