<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DownloadRemoteImagesCommand extends Command
{
    protected $signature = 'lukebouch:download-remote-images';

    protected $description = 'Loops through all posts and downloads all remote images and stores them in S3.';

    public function handle()
    {
        Post::query()->orderBy('published_at')->where('content', 'LIKE', '%static.sublimeblogs.com%')->get()->each(function(Post $post) {
            $post->content = $this->importRemoteImagesForPost($post);

            $post->save();
        });
    }

    /**
     * Downloads all the remote images referenced in the Markdown content, saves them,
     * and then returns the new markdown content.
     */
    private function importRemoteImagesForPost(Post $post)
    {
        return preg_replace_callback('(!\[([^\]])*\]\((.*?)\s*("(?:.*[^"])")?\s*\))', function ($matches) use ($post) {
            if (!str($matches[0])->contains('static.sublimeblogs.com')) {
                return $matches[0];
            }

            try {
                $file = $post->addMediaFromUrl($matches[2])->toMediaCollection('embedded');

                $newUrl = $file->getFullUrl();

                return "![$matches[1]]($newUrl)";
            } catch (\Exception $e) {
                Log::error("Could not download remote image for post with sublime blogs id: $post->sublime_blogs_id", $matches[0]);
                return $matches[0];
            }
        }, $post->content);
    }
}
