<?php

namespace Database\Factories;

use App\Models\Courses;
use Faker\Core\Number;
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

        static $courseId = 0;

        $courseId++;
        if ($courseId > 7) {
            $courseId = 1;
        }

        return [
            'course_id' => $courseId,
            'course_information' => $this->faker->realText(200),
            'recommended_course' => $this->faker->realText(200),
            'learn_course' => $this->faker->realText(200),
            'benefits_course' => $this->faker->realText(200),
        ];

        // return [
        //     // 'course_id'             => Courses::all()->random()->id,
        //     'course_information'    => $this->faker->text(50),
        //     'recommended_course'    => $this->faker->text(50),
        //     'learn_course'          => $this->faker->text(50),
        //     'benefits_course'        => $this->faker->text(50),
        // ];
    }
}
