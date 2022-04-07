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
        static $post_index = 1;
        static $category_index = 0;

        return [
            'title' => 'Ini Title ' . $post_index,
            'content' => 'Ini adalah content dari post ' . $post_index,
            'image' => 'ini-image-' . $post_index++ . '.jpg',
            'user_id' => 1,
            'category_id' => $category_index == 3 ? $category_index = 1 : ++$category_index,
        ];
    }
}
