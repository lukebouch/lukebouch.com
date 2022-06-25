<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WallpaperController;
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
    Route::get('/', [PostController::class, 'index'])->name('.index');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('.show');
});
Route::prefix('/wallpapers')->name('wallpapers')->group(function () {
    Route::get('/', [WallpaperController::class, 'index'])->name('.index');
    Route::get('/{wallpaper}/download', [WallpaperController::class, 'download'])->name('.download');
});

Route::get('/feed.xml', [FeedController::class, 'rss'])->name('feeds.rss');

Route::post('/webhooks/sync-blog-posts', [WebhookController::class, 'syncBlogPosts'])->name('webhooks.sync-blog-posts');

require __DIR__ . '/auth.php';

Route::redirect('/around', 'https://around.co/r/lukebouch');
