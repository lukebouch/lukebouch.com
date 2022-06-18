<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index', [
            'posts' => Post::limit(3)->get(),
        ]);
    }
}
