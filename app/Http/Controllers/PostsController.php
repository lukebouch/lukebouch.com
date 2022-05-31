<?php

namespace App\Http\Controllers;

use App\Services\SublimeBlogs;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('web.posts.index', [
            'posts' => SublimeBlogs::getPosts(),
        ]);
    }
}
