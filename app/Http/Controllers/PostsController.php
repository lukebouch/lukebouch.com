<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);

        return view('web.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('web.posts.show', [
            'post' => $post,
        ]);
    }
}
