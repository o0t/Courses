<?php

namespace Database\Factories;

use App\Models\Categories;
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
        // return [
        //     'name' => $this->faker->unique()->randomElement([
        //         'Languages',
        //         'Computer Networks',
        //         'Information Security',
        //         'Databases',
        //         'Operating Systems',
        //         'Web Development',
        //         'Management and Economics',
        //         'Computer Science',
        //         'Science',
        //         'Mathematics',
        //         'Software',
        //         'Self-Development'
        //     ]),
        // ];






        // $categories = [
        //     'Programming languages'                 => 'programming-languages.jpg',
        //     'Web development'                       => 'web-development.jpg',
        //     'Mobile app development'                => 'mobile-development.jpg',
        //     'Data science'                          => 'data-science.jpg',
        //     'Cybersecurity'                         => 'cybersecurity.jpg',
        //     'Operating Systems'                     => 'operating-systems.jpg',
        //     'Computer network'                      => 'computer-network.jpg',
        //     'DevOps'                                => 'DevOps.jpg',
        // ];

        // $name = $this->faker->unique()->randomElement(array_keys($categories));
        // $imageName = $categories[$name];

        // return [
        //     'name' => $name,
        //     'img' => $imageName,
        // ];





        // $categories = [
        //     'Programming languages'                 => 'programming-languages.jpg',
        //     'Web development'                       => 'web-development.jpg',
        //     'Mobile app development'                => 'mobile-development.jpg',
        //     'Data science'                          => 'data-science.jpg',
        //     'Cybersecurity'                         => 'cybersecurity.jpg',
        //     'Operating Systems'                     => 'operating-systems.jpg',
        //     'Computer network'                      => 'computer-network.jpg',
        //     'DevOps'                                => 'DevOps.jpg',
        // ];

        // $name = array_rand($categories);
        // $imageName = $categories[$name];

        // return [
        //     'name' => $name,
        //     'img' => $imageName,
        // ];



    }
}
