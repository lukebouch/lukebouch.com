<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ExportBlogPostsAsMarkdownFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports blog posts as markdown files.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Storage::disk('local')->deleteDirectory('posts');

        $regex = '/^(\d{8})(.*)$/';

        Post::query()->get()->each(function (Post $post) use ($regex) {
            $path = preg_replace($regex, '$1-$2', str_replace('/', '', $post->slug)) . '.md';
            $string = "---
title: {$post->title}
publish_date: {$post->published_at->toIso8601String()}
---

{$post->content}
";

            Storage::disk('local')->put('posts/' . $path, $string);
        });
    }
}
