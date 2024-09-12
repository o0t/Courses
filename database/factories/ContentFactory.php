<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 'url' => b2764071-6c2a-4f95-91bc-d7f2ed2a473c-1725536065.mp4
        return [
            'courses_id' => Courses::all()->random()->id,
            'title' =>  $this->faker->jobTitle(),
            // 'content' => $this->faker->text(200),
            // 'type' => 'txt',
            'type' => 'video',
            'file_name' => 'd195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4',
            'updated_at' => $this->faker->time,
            'created_at' => $this->faker->time,
            'token' => $this->faker->uuid(),
        ];
    }
}
