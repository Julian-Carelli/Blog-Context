<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'user_id' => 1,
            'category_id' => 1,
            'image' => 'url',
            'content' => $this->faker->text(800),
            'is_validate' => 0,
            'status_posts_id' => 3,
        ];
    }
}
