<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    public function index()
    {
        return view('web.wallpapers.index', [
            'wallpapers' => Wallpaper::latest()->published()->paginate(12),
        ]);
    }

    public function download(Wallpaper $wallpaper)
    {
        if ($wallpaper->isNotPublished()) {
            abort(404);
        }

        return $wallpaper->media('wallpaper')->first();
    }
}
