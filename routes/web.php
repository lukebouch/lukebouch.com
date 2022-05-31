<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, 'index']);
Route::prefix('/posts')->group(function () {
    Route::get('/', [PostsController::class, 'index']);
});

require __DIR__ . '/auth.php';
