<?php

namespace Tests\Feature;

use App\Models\Wallpaper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WallpaperControllerTest extends TestCase
{
    /** @test */
    public function can_see_published_wallpaper()
    {
        $wallpaper = Wallpaper::factory()->published()->create();

        $response = $this->get(route('wallpapers.index'));

        $response->assertSee($wallpaper->name);
    }

    /** @test */
    public function cannot_see_unpublished_wallpaper()
    {
        $wallpaper = Wallpaper::factory()->create();

        $response = $this->get(route('wallpapers.index'));

        $response->assertDontSee($wallpaper->name);
    }
}
