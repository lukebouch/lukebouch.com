<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShortCode>
 */
class ShortCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->asciify('******'),
            'url' => $this->faker->randomElement(['https://lukebouch.com', 'bouchcontracting.com', 'lukebouch.dev']),
        ];
    }
}
