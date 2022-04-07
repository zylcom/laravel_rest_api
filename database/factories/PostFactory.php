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
            'title' => 'Ini Title ' . range(1, 20),
            'content' => 'Ini adalah content dari post ' . range(1, 20),
            'image' => 'ini-image' . range(1, 20) . '.jpg',
            'user_id' => 1,
            'category_id' => range(1, 3),
        ];
    }
}
