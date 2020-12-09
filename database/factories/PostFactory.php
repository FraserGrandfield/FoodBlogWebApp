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
            'profile_id' => Profile::factory(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'cook_time_hours' => $this->faker->numberBetween($min = 0, $max = 10),
            'cook_time_mins' => $this->faker->numberBetween($min = 0, $max = 59),
            'Ingrediants' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'Instructions' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
        ];
    }
}
