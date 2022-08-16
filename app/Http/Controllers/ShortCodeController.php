<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function __invoke(ShortCode $shortCode)
    {
        return redirect($shortCode->url);
    }
}
