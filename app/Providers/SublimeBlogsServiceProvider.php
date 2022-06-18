<?php

namespace App\Providers;

use App\Services\SublimeBlogs;
use Illuminate\Support\ServiceProvider;

class SublimeBlogsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(SublimeBlogs::class, function () {
            return new SublimeBlogs(config('services.sublime-blogs.endpoint'), config('services.sublime-blogs.key'));
        });
    }
}
