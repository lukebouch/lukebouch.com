<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class WebhookControllerTest extends TestCase
{
    /** @test */
    public function can_sync_blog_posts()
    {
        Artisan::shouldReceive('call')->with('sublime-blogs:sync');

        $this->post(route('webhooks.sync-blog-posts'));
    }
}
