<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebhookController;
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
Route::prefix('/posts')->name('posts')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('.index');
    Route::get('/{slug}', [PostsController::class, 'show'])->name('.show');
});

Route::get('/feed.xml', [FeedController::class, 'rss'])->name('feeds.rss');

Route::post('/webhook/clear-cache', [WebhookController::class, 'clearCache'])->name('webhooks.clear-cache');

require __DIR__ . '/auth.php';
