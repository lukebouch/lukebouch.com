<?php

namespace App\Http\Controllers;

use App\Services\SublimeBlogs;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index', [
            'posts' => SublimeBlogs::getPosts()->take(3),
        ]);
    }
}
