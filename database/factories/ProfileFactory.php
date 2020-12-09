<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_picture' => $this->faker->imageUrl($width = 640, $height = 480),
            'bio' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'user_id' => User::factory()
        ];
    }
}
