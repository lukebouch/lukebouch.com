<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Services\Facades\SublimeBlogs;
use Illuminate\Console\Command;

class SyncBlogPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sublime-blogs:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncs posts from Sublime Blogs to the database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = SublimeBlogs::getPosts();

        $posts->sortBy('id')->each(function ($post) {
            Post::updateOrCreate([
                'sublime_blogs_id' => $post['id'],
                'title' => $post['title'],
                'slug' => $post['slug'],
                'content' => $post['content'],
                'published_at' => $post['published_at'],
            ]);
        });

        Post::query()->whereNotIn('sublime_blogs_id', $posts->pluck('id'))->delete();
    }
}
