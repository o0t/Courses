<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CoursesFactory extends Factory
{
    protected $model = Courses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->unique()->word(),
            'url' => $this->faker->slug(),
            'photo' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
            'introductory_video' => '25224c89-ac83-46e4-8d53-4e4a40742a8b-1725792096.mp4',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO',
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}

