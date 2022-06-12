<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function clearCache()
    {
        cache()->clear('posts');

        return 200;
    }
}
