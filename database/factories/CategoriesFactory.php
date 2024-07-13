<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Languages',
                'Computer Networks',
                'Information Security',
                'Databases',
                'Operating Systems',
                'Web Development',
                'Management and Economics',
                'Computer Science',
                'Science',
                'Mathematics',
                'Software',
                'Self-Development'
            ]),
        ];
    }
}
