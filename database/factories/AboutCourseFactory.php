<?php

namespace Database\Factories;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'             => Courses::all()->random()->id,
            'course_information'    => $this->faker->text(50),
            'recommended_course'    => $this->faker->text(50),
            'learn_course'          => $this->faker->text(50),
            'benefits_course'        => $this->faker->text(50),
        ];
    }
}
