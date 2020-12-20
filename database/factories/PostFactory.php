<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
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
            'title' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'profile_id' => Profile::factory()->create()->id,
            'image' => 'defualt_img.png',
            'cook_time' => $this->faker->numberBetween($min = 0, $max = 350),
            'instructions' => $this->faker->realText($maxNbChars = 250, $indexSize = 2),
        ];
    }
}
