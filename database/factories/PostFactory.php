<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'content' => $this->faker->paragraphs(mt_rand(5, 10), true),
            'image' => $this->faker->imageUrl(),
            'user_id' => 1,
            'category_id' => mt_rand(1, 3),
        ];
    }
}
