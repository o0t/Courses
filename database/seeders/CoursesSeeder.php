<?php

namespace Database\Seeders;

use App\Models\AboutCourse;
use App\Models\Content;
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


            $coursesData_BackEnd = [
                ['title' => 'PHP for Beginners',          'photo' => 'php.png'],
                ['title' => 'Getting Started with Laravel', 'photo' => 'laravel.png'],
                ['title' => 'Django Web Framework',       'photo' => 'django.png'],
                ['title' => 'Building Apps with CodeIgniter', 'photo' => 'codeIgniter.png'],
                ['title' => 'Flask Web Development',      'photo' => 'flask.png'],
                ['title' => '.NET Core Basics',           'photo' => 'NET.png'],
                ['title' => 'Node.js Crash Course',       'photo' => 'node.png'],
                ['title' => 'Spring Framework Overview',   'photo' => 'spring.png'],
                ['title' => 'RESTful APIs with Laravel',   'photo' => 'laravel_api.png'],
                ['title' => 'GraphQL with Node.js',       'photo' => 'graphql_node.png'],
            ];

            foreach ($coursesData_BackEnd as $data) {
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



            $coursesData_Full_stack = [
                ['title' => 'Full Stack Development with MERN', 'photo' => 'mern.png'],
                ['title' => 'Building Full Stack Apps with Django', 'photo' => 'django_fullstack.png'],
                ['title' => 'PHP Full Stack Development', 'photo' => 'php_fullstack.png'],
                ['title' => 'Node.js and React Full Stack', 'photo' => 'node_react.png'],
                ['title' => 'Building APIs with Node.js', 'photo' => 'node_api.png'],
                ['title' => 'Full Stack with Laravel and Vue.js', 'photo' => 'laravel_vue.png'],
                ['title' => 'Understanding RESTful Services', 'photo' => 'restful_services.png'],
                ['title' => 'Deploying Full Stack Applications', 'photo' => 'deploy.png'],
                ['title' => 'Authentication in Full Stack Apps', 'photo' => 'authentication.png'],
                ['title' => 'GraphQL Full Stack Development', 'photo' => 'graphql_fullstack.png'],
            ];

            foreach ($coursesData_Full_stack as $data) {
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




            $coursesData_Mobile_app_Android = [
                ['title' => 'Flutter for Android Development', 'photo' => 'flutter.png'],
                ['title' => 'Kotlin Basics for Android', 'photo' => 'kotlin.png'],
                ['title' => 'Android Studio Tutorial', 'photo' => 'android_studio.png'],
                ['title' => 'Building Apps with Jetpack Compose', 'photo' => 'jetpack_compose.png'],
                ['title' => 'Understanding Android Architecture Components', 'photo' => 'architecture_components.png'],
                ['title' => 'Networking in Android with Retrofit', 'photo' => 'retrofit.png'],
                ['title' => 'Creating a Simple Android App', 'photo' => 'simple_app.png'],
                ['title' => 'Android UI Design Principles', 'photo' => 'ui_design.png'],
                ['title' => 'Working with SQLite in Android', 'photo' => 'sqlite.png'],
                ['title' => 'Publishing Your Android App', 'photo' => 'publishing_app.png'],
            ];

            foreach ($coursesData_Mobile_app_Android as $data) {
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
                        'course_information'    => "<p>Explore the world of mobile development with <strong>{$data['title']}</strong>. This course covers the essentials to help you build engaging mobile applications.</p>",
                        'recommended_course'    => "<p>Enhance your skills with these recommended courses: <em>Advanced {$data['title']}</em>, <em>Cross-Platform Development with React Native</em>, and <em>Designing Mobile Apps</em>.</p>",
                        'learn_course'          => "<p>In this course, you'll learn to develop mobile applications using <strong>{$data['title']}</strong>, focusing on hands-on projects and real-world scenarios.</p>",
                        'benefits_course'       => "<p>Completing this course will equip you with essential skills for a career in mobile app development, enabling you to create apps that users love.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );


                    $course->syncTags(['Mobile app development']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }



            $coursesData_Mobile_app_ios = [
                ['title' => 'iOS App Development with SwiftUI',             'photo' => 'iOS_App_Development_SwiftUI.png'],
                ['title' => 'Building iOS Apps with UIKit',                 'photo' => 'Building_iOS_Apps_Uikit.png'],
                ['title' => 'Understanding Core Data in iOS',               'photo' => 'Core_Data_iOS.png'],
                ['title' => 'Networking in iOS Apps with URLSession',       'photo' => 'Networking_iOS_URLSession.png'],
                ['title' => 'Debugging and Testing iOS Applications',       'photo' => 'Debugging_Testing_iOS.png'],
                ['title' => 'Creating User Interfaces with Storyboards',    'photo' => 'User_Interfaces_Storyboards.png'],
                ['title' => 'Introduction to Swift Packages',               'photo' => 'Swift_Packages.png'],
                ['title' => 'Deploying iOS Apps to the App Store',          'photo' => 'Deploying_iOS_Apps.png'],
            ];



            foreach ($coursesData_Mobile_app_ios as $data) {
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
                        'course_information'    => "<p>Explore the world of mobile development with <strong>{$data['title']}</strong>. This course covers the essentials to help you build engaging mobile applications.</p>",
                        'recommended_course'    => "<p>Enhance your skills with these recommended courses: <em>Advanced {$data['title']}</em>, <em>Cross-Platform Development with React Native</em>, and <em>Designing Mobile Apps</em>.</p>",
                        'learn_course'          => "<p>In this course, you'll learn to develop mobile applications using <strong>{$data['title']}</strong>, focusing on hands-on projects and real-world scenarios.</p>",
                        'benefits_course'       => "<p>Completing this course will equip you with essential skills for a career in mobile app development, enabling you to create apps that users love.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['Mobile app development']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }



            $coursesData_Api = [
                ['title' => 'API and Web Service Introduction',                     'photo' => 'API_and_Web_Service_Introduction.png'],
                ['title' => 'Postman: The Complete Guide - REST API Testing',       'photo' => 'Api_Postman.png'],
                ['title' => 'Introduction to REST APIs for Absolute Beginners',     'photo' => 'rest-api.png'],
                ['title' => 'How to Create an API Using Laravel',                   'photo' => 'API_Using_Laravel.png'],
                ['title' => 'Understanding RESTful APIs',                           'photo' => 'Understanding_RESTful_APIs.png'],
                ['title' => 'Comparing REST and GraphQL APIs',                      'photo' => 'Comparing_REST_and_GraphQL_APIs.png'],
                ['title' => 'Building APIs with Node.js and Express',               'photo' => 'Building_APIs_with_Node.js_and_Express.png'],
                ['title' => 'Securing APIs: Best Practices',                        'photo' => 'Securing_APIs_Best_Practices.png'],
                ['title' => 'Integrating Third-Party APIs into Your Applications',  'photo' => 'Integrating_Third_Party_APIs.png'],
                ['title' => 'Using OAuth 2.0 for API Authentication',               'photo' => 'Using_OAuth_2.0_for_API_Authentication.png'],
                ['title' => 'API Rate Limiting: What You Need to Know',             'photo' => 'API_Rate_Limiting.png'],
                ['title' => 'Versioning APIs: Strategies and Best Practices',       'photo' => 'Versioning_APIs_Strategies.png'],
            ];


            foreach ($coursesData_Api as $data) {
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


                    $course->syncTags(['Web development','Other']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }



            $coursesData_Database = [
                ['title' => 'Introduction to SQL',                  'photo' => 'sql.png'],
                ['title' => 'MySQL for Beginners',                  'photo' => 'mysql.png'],
                ['title' => 'PostgreSQL Fundamentals',              'photo' => 'postgresql.png'],
                ['title' => 'MongoDB Basics',                       'photo' => 'mongodb.png'],
                ['title' => 'Database Design Principles',           'photo' => 'database_design.png'],
                ['title' => 'Using SQLite for Mobile Apps',         'photo' => 'sqlite.png'],
                ['title' => 'NoSQL Databases Overview',             'photo' => 'nosql.png'],
                ['title' => 'Transactions and Concurrency in SQL',  'photo' => 'transactions.png'],
                ['title' => 'Data Warehousing Concepts',            'photo' => 'data_warehouse.png'],
                ['title' => 'Database Security Best Practices',     'photo' => 'database_security.png'],
            ];

            foreach ($coursesData_Database as $data) {
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
                        'course_information'    => "<p>Master the basics of database management with <strong>{$data['title']}</strong>. This course will provide you with a solid foundation in database concepts and practices.</p>",
                        'recommended_course'    => "<p>To expand your expertise, consider these recommended courses: <em>Data Warehousing Techniques</em>, <em>Performance Tuning in SQL</em>, and <em>Introduction to Data Analytics</em>.</p>",
                        'learn_course'          => "<p>In this course, you'll delve into <strong>{$data['title']}</strong>, engaging in practical exercises that help solidify your understanding of database systems.</p>",
                        'benefits_course'       => "<p>Completing this course will enhance your skills in data management, making you a valuable asset in any data-driven organization.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['Data science']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }





            $coursesData_Machine_Learning = [
                ['title' => 'Introduction to Machine Learning', 'photo' => 'ml_intro.png'],
                ['title' => 'Supervised Learning Basics',      'photo' => 'supervised_learning.png'],
                ['title' => 'Unsupervised Learning Techniques', 'photo' => 'unsupervised_learning.png'],
                ['title' => 'Deep Learning with TensorFlow',    'photo' => 'tensorflow.png'],
                ['title' => 'Building Neural Networks',         'photo' => 'neural_networks.png'],
                ['title' => 'Model Evaluation and Tuning',      'photo' => 'model_evaluation.png'],
                ['title' => 'Natural Language Processing (NLP)', 'photo' => 'nlp.png'],
                ['title' => 'Computer Vision Fundamentals',      'photo' => 'computer_vision.png'],
                ['title' => 'Reinforcement Learning Overview',   'photo' => 'reinforcement_learning.png'],
                ['title' => 'Machine Learning in Python',       'photo' => 'ml_python.png'],
            ];

            foreach ($coursesData_Machine_Learning as $data) {
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
                        'course_information'    => "<p>Gain a comprehensive understanding of <strong>{$data['title']}</strong>, where you will explore foundational concepts and cutting-edge techniques in machine learning.</p>",
                        'recommended_course'    => "<p>To broaden your skill set, check out these recommended courses: <em>Advanced Machine Learning Techniques</em>, <em>Machine Learning in Practice</em>, and <em>AI and Ethics</em>.</p>",
                        'learn_course'          => "<p>This course offers hands-on experience with <strong>{$data['title']}</strong>, featuring practical projects that apply machine learning algorithms to real-world problems.</p>",
                        'benefits_course'       => "<p>By completing this course, you will acquire valuable skills that are in high demand in the tech industry, empowering you to contribute to innovative AI solutions.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );


                    $course->syncTags(['Artificial Intelligence']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }





            $coursesData_Artificial_Intelligence = [
                ['title' => 'Introduction to Artificial Intelligence', 'photo' => 'ai_intro.png'],
                ['title' => 'Machine Learning vs. AI',               'photo' => 'ml_vs_ai.png'],
                ['title' => 'AI in Robotics',                         'photo' => 'ai_robotics.png'],
                ['title' => 'Natural Language Processing (NLP)',     'photo' => 'nlp_ai.png'],
                ['title' => 'Computer Vision with AI',                'photo' => 'computer_vision_ai.png'],
                ['title' => 'AI Ethics and Bias',                     'photo' => 'ai_ethics.png'],
                ['title' => 'Building AI Chatbots',                   'photo' => 'ai_chatbots.png'],
                ['title' => 'AI in Healthcare',                        'photo' => 'ai_healthcare.png'],
                ['title' => 'Deep Learning for AI',                   'photo' => 'deep_learning_ai.png'],
                ['title' => 'AI Applications in Business',            'photo' => 'ai_business.png'],
            ];

            foreach ($coursesData_Artificial_Intelligence as $data) {
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
                        'course_information'    => "<p>Discover the transformative world of <strong>{$data['title']}</strong>. This course introduces key concepts and applications of AI across various industries.</p>",
                        'recommended_course'    => "<p>To further enhance your understanding, consider these recommended courses: <em>Deep Learning with AI</em>, <em>Natural Language Processing</em>, and <em>AI for Business</em>.</p>",
                        'learn_course'          => "<p>Engage with <strong>{$data['title']}</strong> through hands-on projects that illustrate the principles of AI and its impact on technology today.</p>",
                        'benefits_course'       => "<p>By completing this course, you will gain essential skills that are increasingly sought after in today's job market, preparing you for a career in AI development.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );


                    $course->syncTags(['Artificial Intelligence']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }




            $coursesData_Network = [
                ['title' => 'Introduction to Networking',         'photo' => 'network_intro.png'],
                ['title' => 'TCP/IP Protocol Suite',               'photo' => 'tcp_ip.png'],
                ['title' => 'Understanding LAN and WAN',          'photo' => 'lan_wan.png'],
                ['title' => 'Network Security Fundamentals',        'photo' => 'network_security.png'],
                ['title' => 'Setting Up a Home Network',           'photo' => 'home_network.png'],
                ['title' => 'Wireless Networking Basics',          'photo' => 'wireless_networking.png'],
                ['title' => 'VPNs and Their Usage',                'photo' => 'vpn.png'],
                ['title' => 'Network Troubleshooting Techniques',   'photo' => 'network_troubleshooting.png'],
                ['title' => 'Introduction to Cloud Networking',     'photo' => 'cloud_networking.png'],
                ['title' => 'Future of Networking Technologies',    'photo' => 'network_future.png'],
            ];

            foreach ($coursesData_Network as $data) {
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
                        'course_information'    => "<p>Understand the essential concepts of <strong>{$data['title']}</strong>. This course provides a strong foundation in networking principles and practices.</p>",
                        'recommended_course'    => "<p>To further your knowledge, consider these recommended courses: <em>Advanced Network Security</em>, <em>Cloud Networking Solutions</em>, and <em>Network Troubleshooting Techniques</em>.</p>",
                        'learn_course'          => "<p>This course offers hands-on learning experiences in <strong>{$data['title']}</strong>, helping you apply theoretical concepts to real-world networking scenarios.</p>",
                        'benefits_course'       => "<p>Upon completion, you'll acquire valuable networking skills that are crucial for career advancement in the IT field.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['Computer network']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }



            $coursesData_Cybersecurity = [
                ['title' => 'Introduction to Cybersecurity',        'photo' => 'cybersecurity_intro.png'],
                ['title' => 'Network Security Basics',              'photo' => 'network_security.png'],
                ['title' => 'Understanding Malware and Viruses',   'photo' => 'malware.png'],
                ['title' => 'Ethical Hacking Fundamentals',         'photo' => 'ethical_hacking.png'],
                ['title' => 'Cybersecurity Best Practices',         'photo' => 'best_practices.png'],
                ['title' => 'Incident Response Planning',            'photo' => 'incident_response.png'],
                ['title' => 'Data Protection and Privacy Laws',     'photo' => 'data_privacy.png'],
                ['title' => 'Penetration Testing Techniques',        'photo' => 'penetration_testing.png'],
                ['title' => 'Cloud Security Essentials',             'photo' => 'cloud_security.png'],
                ['title' => 'Cybersecurity for Small Businesses',   'photo' => 'small_business_security.png'],
            ];


            foreach ($coursesData_Cybersecurity as $data) {
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
                        'course_information'    => "<p>Explore the critical field of <strong>{$data['title']}</strong>. This course covers essential cybersecurity concepts and practices to protect systems and data.</p>",
                        'recommended_course'    => "<p>To deepen your expertise, consider these recommended courses: <em>Advanced Cybersecurity Techniques</em>, <em>Penetration Testing and Vulnerability Assessment</em>, and <em>Cybersecurity Compliance Standards</em>.</p>",
                        'learn_course'          => "<p>Engage in practical exercises and real-world scenarios related to <strong>{$data['title']}</strong>, preparing you for challenges in the cybersecurity landscape.</p>",
                        'benefits_course'       => "<p>Completing this course equips you with vital skills needed to safeguard digital assets, making you an asset in the ever-evolving cybersecurity field.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['Cybersecurity']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }




            $coursesData_Linux = [
                ['title' => 'Introduction to Linux',                  'photo' => 'linux_intro.png'],
                ['title' => 'Linux Command Line Basics',              'photo' => 'linux_command_line.png'],
                ['title' => 'File System Management in Linux',        'photo' => 'linux_file_system.png'],
                ['title' => 'Linux Shell Scripting',                   'photo' => 'shell_scripting.png'],
                ['title' => 'Managing Users and Groups in Linux',     'photo' => 'user_management.png'],
                ['title' => 'Installing Software on Linux',           'photo' => 'software_installation.png'],
                ['title' => 'Linux Networking Fundamentals',           'photo' => 'linux_networking.png'],
                ['title' => 'Linux Security Best Practices',           'photo' => 'linux_security.png'],
                ['title' => 'Troubleshooting in Linux',                'photo' => 'linux_troubleshooting.png'],
                ['title' => 'Linux for DevOps',                        'photo' => 'linux_devops.png'],
            ];


            foreach ($coursesData_Linux as $data) {
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
                        'course_information'    => "<p>Learn the essentials of <strong>{$data['title']}</strong>. This course provides a solid foundation in Linux operating systems and their applications.</p>",
                        'recommended_course'    => "<p>To further enhance your skills, check out these recommended courses: <em>Advanced Linux Administration</em>, <em>Linux for Developers</em>, and <em>Cloud Computing with Linux</em>.</p>",
                        'learn_course'          => "<p>This course involves hands-on projects related to <strong>{$data['title']}</strong>, helping you apply your knowledge in real-world scenarios.</p>",
                        'benefits_course'       => "<p>By completing this course, you will acquire valuable Linux skills that are essential for careers in IT and software development.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );


                    $course->syncTags(['Operating Systems']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }



            $coursesData_DevOps = [
                ['title' => 'Introduction to DevOps',                  'photo' => 'devops_intro.png'],
                ['title' => 'Understanding CI/CD Pipelines',           'photo' => 'ci_cd.png'],
                ['title' => 'Infrastructure as Code (IaC)',            'photo' => 'iac.png'],
                ['title' => 'Containerization with Docker',             'photo' => 'docker.png'],
                ['title' => 'Orchestration with Kubernetes',            'photo' => 'kubernetes.png'],
                ['title' => 'Monitoring and Logging in DevOps',        'photo' => 'monitoring_logging.png'],
                ['title' => 'Configuration Management Tools',           'photo' => 'configuration_management.png'],
                ['title' => 'DevOps Best Practices',                    'photo' => 'best_practices.png'],
                ['title' => 'Testing in a DevOps Environment',          'photo' => 'devops_testing.png'],
                ['title' => 'DevOps Culture and Collaboration',         'photo' => 'devops_culture.png'],
            ];


            foreach ($coursesData_DevOps as $data) {
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
                        'course_information'    => "<p>Explore the world of <strong>{$data['title']}</strong>. This course introduces key DevOps principles, practices, and tools used in modern software development.</p>",
                        'recommended_course'    => "<p>To further your expertise, consider these recommended courses: <em>Advanced DevOps Practices</em>, <em>DevOps with Kubernetes</em>, and <em>Site Reliability Engineering</em>.</p>",
                        'learn_course'          => "<p>Engage in practical exercises related to <strong>{$data['title']}</strong>, allowing you to apply DevOps methodologies to real-world projects.</p>",
                        'benefits_course'       => "<p>By completing this course, you will gain valuable skills that are essential for improving collaboration between development and operations teams, enhancing your career in IT.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);

                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['DevOps']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }




            $coursesData_Other = [
                ['title' => 'Introduction to Cloud Computing',         'photo' => 'cloud_computing.png'],
                ['title' => 'Blockchain Basics',                        'photo' => 'blockchain.png'],
                ['title' => 'Introduction to Data Science',             'photo' => 'data_science.png'],
                ['title' => 'Digital Marketing Strategies',             'photo' => 'digital_marketing.png'],
                ['title' => 'Introduction to IoT (Internet of Things)', 'photo' => 'iot.png'],
                ['title' => 'Agile Methodologies Overview',             'photo' => 'agile.png'],
                ['title' => 'Introduction to UX/UI Design',             'photo' => 'ux_ui_design.png'],
                ['title' => 'Getting Started with 3D Printing',        'photo' => '3d_printing.png'],
                ['title' => 'Introduction to Quantum Computing',        'photo' => 'quantum_computing.png'],
                ['title' => 'Sustainable Technology Practices',         'photo' => 'sustainable_tech.png'],
            ];

            foreach ($coursesData_Other as $data) {
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
                        'course_information'    => "<p>Discover the essentials of <strong>{$data['title']}</strong>. This course provides valuable insights and skills that are applicable across various fields.</p>",
                        'recommended_course'    => "<p>To expand your knowledge, consider these recommended courses: <em>Advanced Project Management</em>, <em>SEO Strategies for Digital Marketing</em>, and <em>Design Thinking Techniques</em>.</p>",
                        'learn_course'          => "<p>This course features hands-on projects related to <strong>{$data['title']}</strong>, allowing you to apply your learning in practical settings.</p>",
                        'benefits_course'       => "<p>By completing this course, you'll enhance your skill set, making you more versatile and competitive in the job market.</p>",
                        'created_at'            => now(), // Current timestamp
                    ]);


                    $course->content()->createMany(
                        collect(range(0, 49))->map(function ($index) use ($course) {
                            return Content::factory()->withDynamicTitle($course->title, $index)->make([
                                'courses_id' => $course->id,
                            ])->toArray();
                        })->toArray()
                    );

                    $course->syncTags(['Other']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }


    }
}
