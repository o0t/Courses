<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\AboutCourse;
use App\Models\Content;
use App\Models\Courses;
use App\Models\courses_categories;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import Str facade


class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // testing

        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'Developer',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => 123456789,
            'about' => 'I am a web developer.',
            'email_verified_at' => null,
            'password' => bcrypt('admin@admin.com'),
            'remember_token' => null,
        ]);

        $teacher = User::create([
            'first_name' => 'test',
            'last_name' => 'Developer',
            'username' => 'test',
            'email' => 'test@test.com',
            'phone' => 123456789,
            'about' => 'This is for Testing.',
            'email_verified_at' => null,
            'password' => bcrypt('test@test.com'),
            'remember_token' => null,
        ]);

        User::factory(50)->create();
        $admin->assignRole('admin');
        $teacher->assignRole('teacher');


        $RED = "\033[31m";
        $ENDCOLOR = "\033[0m";
        $faker = Faker::create(); // Initialize Faker

            $coursesData_FrontEnd = [
                ['title' => 'HTML Basics',                      'photo' => 'html.png'],
                ['title' => 'CSS Fundamentals',                 'photo' => 'css.png'],
                ['title' => 'Bootstrap 5 Tutorial',             'photo' => 'BootStrap.png'],
                ['title' => 'Getting Started with Sass',        'photo' => 'Sass.png'],
                ['title' => 'React.js Crash Course',            'photo' => 'react.png'],
                ['title' => 'JavaScript Essentials',            'photo' => 'JavaScript.png'],
                ['title' => 'Tailwind CSS for Beginners',       'photo' => 'tailwind-css.png'],
                ['title' => 'Vue.js Overview',                  'photo' => 'vue.png'],
                ['title' => 'Angular Basics',                   'photo' => 'angular.png'],
                ['title' => 'Web Accessibility Best Practices', 'photo' => 'accessibility.png'],
            ];

            foreach ($coursesData_FrontEnd as $data) {
                // Set the source path for the images in public
                $sourcePath = public_path('images/Seeder/' . $data['photo']);

                // Check if the file exists
                if (file_exists($sourcePath)) {
                    // Store the image in storage/app/public/images

                    $randomName = Str::random(10) . '.' . pathinfo($data['photo'], PATHINFO_EXTENSION);

                    Storage::disk('public')->putFileAs('course_img', $sourcePath, $randomName);

                                        // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    AboutCourse::create([
                        'course_id'             => $course->id, // Link to the created course
                        'course_information'    => "<p>Dive deep into the fundamentals of <strong>{$data['title']}</strong>, where you'll explore essential concepts and practical applications. This course is designed to equip you with the skills necessary to excel in web development.</p>",
                        'recommended_course'    => "<p>To further enhance your knowledge, consider exploring these recommended courses: <em>Advanced {$data['title']}</em>, <em>Project-Based {$data['title']}</em>, and <em>Expert Techniques in {$data['title']}</em>.</p>",
                        'learn_course'          => "<p>You'll learn how to effectively utilize <strong>{$data['title']}</strong> by engaging in hands-on projects, interactive exercises, and real-world examples that solidify your understanding.</p>",
                        'benefits_course'       => "<p>By completing this course, you'll gain valuable skills that will not only boost your career prospects but also empower you to create stunning, responsive websites that stand out.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);



                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['Web development']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";
                }
            }


        // $testing->assignRole('admin');
        // $testing->assignRole('teacher');
        // $testing->assignRole('student');


    }
}
