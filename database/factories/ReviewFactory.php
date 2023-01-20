<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => fake()->paragraphs(3, true),
            'star' => fake()->numberBetween(1, 5),
            'review_by' => User::all()->random()->id,
            'course_id' => Course::all()->random()->id,
        ];
    }
}
