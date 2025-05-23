<?php

namespace Database\Factories;

use App\Models\Post;
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
    // protected $model = 'Post';
    // protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'sub_title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'slug' => Str()->slug(fake()->sentence())
        ];
    }
}
