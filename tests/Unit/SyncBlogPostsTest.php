<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Services\Facades\SublimeBlogs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SyncBlogPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_sync_blog_posts()
    {
        SublimeBlogs::shouldReceive('getPosts')->andReturn($this->dummyData());

        Artisan::call('sublime-blogs:sync');

        $this->assertDatabaseHas('posts', [
            'sublime_blogs_id' => 302,
            'title' => null,
            'slug' => 'test-slug',
            'content' => "It's not often the company you work for sends you a glow in the dark pen!\n
                ![](https://static.sublimeblogs.com/uploads/JDJ5JDEwJHNmNUNLZXU2Li5JTGpvRmJ6aTByNC5rczlNaXB3VUx6bnFxa0VqMXVFZGJOejBkYjRaU0ZL/037d1e46-c9df-4849-8a58-1bf7a2992d35.jpg)"
        ]);
    }

    /** @test */
    public function it_can_delete_posts_deleted_remotely()
    {
        $deletedPost = Post::factory()->create([
            'sublime_blogs_id' => 1,
            'title' => null,
            'slug' => 'test-slug',
            'content' => "It's not often the company you work for sends you a glow in the dark pen!\n
                ![](https://static.sublimeblogs.com/uploads/JDJ5JDEwJHNmNUNLZXU2Li5JTGpvRmJ6aTByNC5rczlNaXB3VUx6bnFxa0VqMXVFZGJOejBkYjRaU0ZL/037d1e46-c9df-4849-8a58-1bf7a2992d35.jpg)",
        ]);

        SublimeBlogs::shouldReceive('getPosts')->andReturn($this->dummyData());

        Artisan::call('sublime-blogs:sync');

        $this->assertDatabaseMissing('posts', [
            'sublime_blogs_id' => 1,
            'title' => null,
            'slug' => 'test-slug',
            'content' => "It's not often the company you work for sends you a glow in the dark pen!\n
                ![](https://static.sublimeblogs.com/uploads/JDJ5JDEwJHNmNUNLZXU2Li5JTGpvRmJ6aTByNC5rczlNaXB3VUx6bnFxa0VqMXVFZGJOejBkYjRaU0ZL/037d1e46-c9df-4849-8a58-1bf7a2992d35.jpg)",
        ]);
    }

    private function dummyData()
    {
        return collect([
            [
                "id" => 302,
                "title" => null,
                "slug" => 'test-slug',
                "content" => "It's not often the company you work for sends you a glow in the dark pen!\n
                ![](https://static.sublimeblogs.com/uploads/JDJ5JDEwJHNmNUNLZXU2Li5JTGpvRmJ6aTByNC5rczlNaXB3VUx6bnFxa0VqMXVFZGJOejBkYjRaU0ZL/037d1e46-c9df-4849-8a58-1bf7a2992d35.jpg)",
                "html_content" => '<p>It\'s not often the company you work for sends you a glow in the dark pen!\n
                <img src="https://static.sublimeblogs.com/uploads/JDJ5JDEwJHNmNUNLZXU2Li5JTGpvRmJ6aTByNC5rczlNaXB3VUx6bnFxa0VqMXVFZGJOejBkYjRaU0ZL/037d1e46-c9df-4849-8a58-1bf7a2992d35.jpg" alt="" /></p>\n',
                "published_at" => "2022-06-18T14:49:25.000000Z",
                "updated_at" => "2022-06-18T14:49:25.000000Z",
            ]
        ]);
    }
}
