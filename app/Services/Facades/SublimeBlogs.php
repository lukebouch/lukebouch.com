<?php

namespace App\Services\Facades;

use App\Services\SublimeBlogs as ServicesSublimeBlogs;
use Illuminate\Support\Facades\Facade;

class SublimeBlogs extends Facade
{
    public static function getFacadeAccessor()
    {
        return ServicesSublimeBlogs::class;
    }
}
