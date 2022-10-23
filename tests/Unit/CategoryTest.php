<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_saves_a_slug_to_the_database_when_creating_a_category()
    {
        $name = 'Web Development';

        $category = Category::create([
            'name' => $name,
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => $name,
            'slug' => 'web-development',
        ]);
    }

    /** @test */
    public function it_saves_a_slug_to_the_database_when_updating_the_name()
    {
        $name = 'Web Development';

        $category = Category::create([
            'name' => $name,
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => $name,
            'slug' => 'web-development',
        ]);
    }
}
