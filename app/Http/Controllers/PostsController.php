<?php

namespace App\Http\Controllers;

use App\Helpers\PaginationHelper;
use App\Services\SublimeBlogs;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = PaginationHelper::paginate(SublimeBlogs::getPosts(), 10);

        return view('web.posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = SublimeBlogs::getPosts()->where('slug', $slug)->first();

        return view('web.posts.show', [
            'post' => $post,
        ]);
    }
}
