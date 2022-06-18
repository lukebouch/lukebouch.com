<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class WebhookController extends Controller
{
    public function syncBlogPosts()
    {
        Artisan::call('sublime-blogs:sync');

        return 200;
    }
}
