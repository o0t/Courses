<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\courses_categories;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $coursesData_FrontEnd = [
                ['title' => 'html',         'photo' => 'html.png'],
                ['title' => 'Css',          'photo' => 'css.png'],
                ['title' => 'BootStrap',    'photo' => 'BootStrap.png'],
                ['title' => 'Sass',         'photo' => 'Sass.png'],
                ['title' => 'React.js',     'photo' => 'react.png'],
                ['title' => 'JavaScript',   'photo' => 'JavaScript.png'],
                ['title' => 'Tailwind CSS', 'photo' => 'tailwind-css.png'],
            ];

            foreach ($coursesData_FrontEnd as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 21,
                ]);
            }


            $coursesData_BackEnd = [
                ['title' => 'PHP',          'photo' => 'php.png'],
                ['title' => 'Laravel',      'photo' => 'laravel.png'],
                ['title' => 'Django',       'photo' => 'django.png'],
                ['title' => 'CodeIgniter',  'photo' => 'codeIgniter.png'],
                ['title' => 'Flask',        'photo' => 'flask.png'],
                ['title' => '.NET',         'photo' => 'NET.png'],
                ['title' => 'Node.js',      'photo' => 'node.png'],
                ['title' => 'Spring',       'photo' => 'spring.png'],
            ];

            foreach ($coursesData_BackEnd as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 22,
                ]);
            }




            $coursesData_FullStack = array_merge($coursesData_FrontEnd, $coursesData_BackEnd);

            foreach ($coursesData_FullStack as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                    'user_id' => User::all()->random()->id,
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 23,
                ]);
            }



            foreach ($coursesData_BackEnd as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                    'user_id' => User::all()->random()->id,
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 24,
                ]);
            }


            $coursesData_Mobile_app_Android= [
                ['title' => 'Flutter',          'photo' => 'flutter.png'],
                ['title' => 'Kotlin',           'photo' => 'kotlin.png'],
            ];

            foreach ($coursesData_Mobile_app_Android as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 25,
                ]);
            }



            $coursesData_Mobile_app_ios= [
                ['title' => 'Swift',          'photo' => 'swift.png'],
                ['title' => 'objective-c',    'photo' => 'objective-c.png'],
            ];

            foreach ($coursesData_Mobile_app_ios as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 26,
                ]);
            }



            $coursesData_Mobile_app_ios= [
                ['title' => 'React Native','photo' => 'react.png'],
            ];

            foreach ($coursesData_Mobile_app_ios as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],
                    'name' => $data['title'],
                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 27,
                ]);
            }






    }
}
