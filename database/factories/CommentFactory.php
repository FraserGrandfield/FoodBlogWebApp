<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->realText($maxNbChars = 50, $indexSize = 5),
            'profile_id' => Profile::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
