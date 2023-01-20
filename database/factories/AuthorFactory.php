<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'image' => fake()->imageUrl(200, 200),
            'twitter_url' => fake()->url(),
            'github_url' => fake()->url(),
            'website_url' => fake()->url(),
            'description' => fake()->paragraphs(3, true),
        ];
    }
}
