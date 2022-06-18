<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function rss()
    {
        return view('web.feeds.rss', [
            'posts' => Post::all(),
        ]);
    }
}
