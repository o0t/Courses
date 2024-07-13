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
            // 'user_id'               => User::all()->random()->id,
            'user_id'               => 2,
            'title'                 => $this->faker->jobTitle(),
            'name'                  => $this->faker->name(),
            'url'                   => $this->faker->url(),
            'token'                 => '$2y$10$hSg8pTgooDYawQEoRXddmengrJjz6nysryVe4bLEEaY5/YRsGX822'
        ];
    }
}


