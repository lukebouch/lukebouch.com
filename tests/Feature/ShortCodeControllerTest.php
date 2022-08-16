<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\ShortCode;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortCodeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_return_redirect()
    {
        $shortCode = ShortCode::factory()->create();

        $this->get(route('shortCode', $shortCode))
            ->assertRedirect($shortCode->url);
    }
}
