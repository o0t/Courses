<?php

namespace Database\Seeders;

use App\Models\Courses;
use App\Models\courses_categories;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import Str facade

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            // $coursesData_FrontEnd = [
            //     ['title' => 'html',         'photo' => 'html.png'],
            //     ['title' => 'Css',          'photo' => 'css.png'],
            //     ['title' => 'BootStrap',    'photo' => 'BootStrap.png'],
            //     ['title' => 'Sass',         'photo' => 'Sass.png'],
            //     ['title' => 'React.js',     'photo' => 'react.png'],
            //     ['title' => 'JavaScript',   'photo' => 'JavaScript.png'],
            //     ['title' => 'Tailwind CSS', 'photo' => 'tailwind-css.png'],
            // ];

            // foreach ($coursesData_FrontEnd as $data) {
            //     $course = Courses::factory()->create([
            //         'title' => $data['title'],

            //         'url' => $data['title'],
            //         'photo' => $data['photo'],
            //     ]);

            //     // Link course to category
            //     courses_categories::create([
            //         'course_id' => $course->id,
            //         'category_id' => 1,
            //     ]);
            // }


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
                // Set the source path for the images in public
                $sourcePath = public_path('images/Seeder/' . $data['photo']);

                // Check if the file exists
                if (file_exists($sourcePath)) {
                    // Store the image in storage/app/public/images

                    $randomName = Str::random(10) . '.' . pathinfo($data['photo'], PATHINFO_EXTENSION);

                    Storage::disk('public')->putFileAs('course_img', $sourcePath, $randomName);

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Front-End']);


                } else {
                    // Handle the case where the file does not exist
                    echo "File not found: " . $sourcePath . "\n";
                }
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

                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 2,
                ]);
            }




            $coursesData_FullStack = array_merge($coursesData_FrontEnd, $coursesData_BackEnd);

            foreach ($coursesData_FullStack as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],

                    'url' => $data['title'],
                    'photo' => $data['photo'],
                    'user_id' => User::all()->random()->id,
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 3,
                ]);
            }



            foreach ($coursesData_BackEnd as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],

                    'url' => $data['title'],
                    'photo' => $data['photo'],
                    'user_id' => User::all()->random()->id,
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 4,
                ]);
            }


            $coursesData_Mobile_app_Android= [
                ['title' => 'Flutter',          'photo' => 'flutter.png'],
                ['title' => 'Kotlin',           'photo' => 'kotlin.png'],
            ];

            foreach ($coursesData_Mobile_app_Android as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],

                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 5,
                ]);
            }



            $coursesData_Mobile_app_ios= [
                ['title' => 'Swift',          'photo' => 'swift.png'],
                ['title' => 'objective-c',    'photo' => 'objective-c.png'],
            ];

            foreach ($coursesData_Mobile_app_ios as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],

                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 6,
                ]);
            }



            $coursesData_Mobile_app= [
                ['title' => 'React Native','photo' => 'react.png'],
            ];

            foreach ($coursesData_Mobile_app as $data) {
                $course = Courses::factory()->create([
                    'title' => $data['title'],

                    'url' => $data['title'],
                    'photo' => $data['photo'],
                ]);

                // Link course to category
                courses_categories::create([
                    'course_id' => $course->id,
                    'category_id' => 7,
                ]);
            }






    }
}
