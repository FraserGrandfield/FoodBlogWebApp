<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'profile_id' => Profile::factory(),
            'image' => Str::random(10),
            'body' => $this->faker->realText($maxNbChars = 200, $indexSize = 2)
        ];
    }
}
