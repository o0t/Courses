<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'               => User::all()->random()->id,
            'title'                 => $this->faker->jobTitle(),
            'name'                  => $this->faker->name(),
            'url'                   => $this->faker->word,
            'photo'                 => 'test.png',
            'introductory_video'    => 'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4',
            'token'                 => '$2y$10$hSg8pTgooDYawQEoRXddmengrJjz6nysryVe4bLEEaY5/YRsGX822',
            'updated_at'            => $this->faker->dateTimeBetween('-1 years', 'now'),
            'created_at'            => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}

