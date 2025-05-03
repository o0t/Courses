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

        $RED = "\033[31m";
        $ENDCOLOR = "\033[0m";

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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Back-End']);



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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Full-Stack']);



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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Android']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['iOS']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['API']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Database']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Machine Learning']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Network']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Linux']);


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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

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

                    // Storage::disk('public')->putFileAs('course_img', $sourcePath, $data['photo']);

                    // Create the course
                    $course = Courses::factory()->create([
                        'title' => $data['title'],
                        'url'   => $data['title'],
                        'photo' => 'storage/course_img/' . $randomName, // Path for accessing the image
                    ]);

                    $course->syncTags(['Other']);


                } else {
                    // Handle the case where the file does not exist
                    echo $RED . "File not found: " . $sourcePath . $ENDCOLOR . "\n";

                }
            }


    }
}
