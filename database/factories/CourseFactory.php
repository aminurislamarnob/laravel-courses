<?php

namespace Database\Factories;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'slug' => fake()->slug(),
            'type' => rand(0, 1),
            'resources' => rand(1, 50),
            'year' => fake()->year(),
            'price' => random_int(0.00, 500),
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraphs(3, true),
            'link' => fake()->url(),
            'duration' => rand(0, 2),
            'level' => rand(0, 2),
            'submitted_by' => User::all()->random()->id,
            'platform_id' => Platform::all()->random()->id
        ];
    }
}
