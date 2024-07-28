<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\courses_categories;
use App\Models\User;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'html',
            'name' => 'html',
            'url' => 'html',
            'photo' => 'html.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);


        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Css',
            'name' => 'Css',
            'url' => 'Css',
            'photo' => 'css.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);


        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'BootStrap',
            'name' => 'BootStrap',
            'url' => 'BootStrap',
            'photo' => 'BootStrap.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);



        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Sass',
            'name' => 'Sass',
            'url' => 'Sass',
            'photo' => 'Sass.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);




        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'React.js',
            'name' => 'React.js',
            'url' => 'React.js',
            'photo' => 'react.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);


        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'JavaScript',
            'name' => 'JavaScript',
            'url' => 'JavaScript',
            'photo' => 'JavaScript.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);


        Courses::create([
            'user_id' => User::all()->random()->id,
            'title' => 'Tailwind CSS',
            'name' => 'Tailwind CSS',
            'url' => 'Tailwind-CSS',
            'photo' => 'tailwind-css.png',
            'token' => '$2y$10$7Kz/N5p7px7dd0rqPUmB4uhlfN1aXG/R2w86ciAD7oWWpKarZklZO'
        ]);



            $course_ids = range(1, 7);

            $category_id = 21;

            foreach ($course_ids as $course_id) {
                courses_categories::create([
                    'course_id' => $course_id,
                    'category_id' => $category_id,
                ]);
            }



    }
}
