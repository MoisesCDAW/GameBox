<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->sentence(20),
            'score' => rand(1, 5),
            'user_id' => 1,
            'videogame_id' => rand(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
