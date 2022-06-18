<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_display_a_list_of_posts()
    {
        $post = Post::factory()->published()->create();

        $response = $this->get(route('posts.index'));

        $response->assertSee($post->title)
            ->assertSee($post->excerpt)
            ->assertSee(route('posts.show', [$post->slug]));
    }

    /** @test */
    public function can_display_a_post()
    {
        $post = Post::factory()->published()->create();

        $response = $this->get(route('posts.show', [$post->slug]));

        $response->assertSee($post->title)
            ->assertSee($post->excerpt);
    }

    /** @test */
    public function can_display_404_if_post_does_not_exists()
    {
        $response = $this->get(route('posts.show', ['slug']));

        $response->assertNotFound();
    }
}
