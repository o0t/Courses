<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'courses_id'    => Courses::all()->random()->id,
            'user_id'       => User::all()->random()->id,
            'name'          => $this->faker->domainName,
            'description'   => $this->faker->text(50),
            'image_out'     => 'projects.png',
            // 'image_out'     => $this->faker->imageUrl(100, 100),
            'image1'        => 'projects.png',
            'image2'        => 'projects.png',
            'image3'        => 'projects.png',
            'image4'        => 'projects.png',
            'link1'         => $this->faker->url(),
            'link2'         => $this->faker->url(),
            'likes'         => $this->faker->numberBetween(1,1500),
            'views'         => $this->faker->numberBetween(1,5000),
            'token'         => Str::random(10),
            'updated_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
            'created_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
