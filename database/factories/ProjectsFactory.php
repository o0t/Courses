<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            // 'image_out'     => 'projects.png',
            'image_out'     => 'image0.2c4a0dda-a760-4e36-9c20-52a83335005c-1727460659.png',
            'image1'        => 'https://incoserin.com/wp-content/uploads/2014/03/img.gif',
            'image2'        => 'https://incoserin.com/wp-content/uploads/2014/03/img.gif',
            'image3'        => 'https://incoserin.com/wp-content/uploads/2014/03/img.gif',
            'image4'        => 'https://incoserin.com/wp-content/uploads/2014/03/img.gif',
            'link1'         => $this->faker->url(),
            'link2'         => $this->faker->url(),
            'likes'         => $this->faker->numberBetween(1,1500),
            'views'         => $this->faker->numberBetween(1,5000),
            'updated_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
            'created_at'    => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
