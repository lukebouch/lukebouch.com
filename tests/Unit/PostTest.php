<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_set_the_slug_based_on_the_title_when_creating_a_post()
    {
        $post = Post::factory()->create([
            'title' => 'This is a test.',
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => now()->format('Y/m/d') . '/this-is-a-test',
        ]);
    }

    /** @test */
    public function it_can_set_the_slug_based_on_the_content_when_creating_a_post()
    {
        $post = Post::factory()->create([
            'title' => null,
            'content' => 'This is a test.',
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'content' => $post->content,
            'slug' => now()->format('Y/m/d') . '/this-is-a',
        ]);
    }

    /** @test */
    public function it_does_not_change_the_slug_when_updating_the_title_or_content()
    {
        $post = Post::factory()->create();
        $post->slug = 'Test';
        $post->save();

        $post->title = 'New title';
        $post->content = 'New content';
        $post->save();

        $this->assertDatabaseHas('posts', [
           'id' => $post->id,
           'slug' => 'Test',
           'title' => 'New title',
           'content' => 'New content'
        ]);
    }
}
