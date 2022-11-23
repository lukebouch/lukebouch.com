<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->published()->paginate(12);

        return view('web.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('web.posts.show', [
            'post' => $post,
        ]);
    }
}
