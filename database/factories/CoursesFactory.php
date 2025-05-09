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

        $userId = $this->faker->randomElement([1, 2]);

        return [
            'user_id' => $userId,
            'title' => $this->faker->unique()->word(),
            'url' => $this->faker->slug(),
            'count_videos' => $this->faker->numberBetween(0,100),
            'subscribers'  => $this->faker->numberBetween(0,500),
            'views'        => $this->faker->numberBetween(0,1000),
            'likes'        => $this->faker->numberBetween(0,1000),
            'count_lessons'=> $this->faker->numberBetween(0,1000),
            'photo' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker', true),
            'introductory_video' => '5IzXWePzvh45BvKK2eUMlSo5gQIXfiI6zdfrtl1r.mp4',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO',
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}

