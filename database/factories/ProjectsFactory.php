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
            // 'image_out'     => 'projects.png',
            'image_out'     => 'image0.06cca95a-4bdc-4163-83e1-1d38772978db-1727649826.png',
            'image1'        => 'image0.06cca95a-4bdc-4163-83e1-1d38772978db-1727649826.png',
            'image2'        => 'image0.37c96a75-4e59-47c0-8f15-4c5306ee6ec8-1727649814.png',
            'image3'        => 'image0.a0d9a845-2ee4-4632-8c68-6922bddc3d7f-1727649804.png',
            'image4'        => 'image0.d43a3f97-9ad3-4984-afbe-f39878a7f97d-1727649843.png',
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
