<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebhookControllerTest extends TestCase
{
    /** @test */
    public function can_clear_cache()
    {
        cache()->put('posts', 'Test');

        $this->assertEquals('Test', cache('posts'));
        $this->post(route('webhooks.clear-cache'));
        $this->assertNull(cache('posts'));
    }
}
