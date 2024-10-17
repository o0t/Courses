<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Main_categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $Main_categories = [
            ['name' => 'Programming languages',     'img' => 'programming-languages.png'],
            ['name' => 'Web development',           'img' => 'web-development.png'],
            ['name' => 'Mobile app development',    'img' => 'mobile-development.png'],
            ['name' => 'Data science',              'img' => 'data-science.png'],
            ['name' => 'Cybersecurity',             'img' => 'cybersecurity.png'],
            ['name' => 'Operating Systems',         'img' => 'operating-systems.png'],
            ['name' => 'Computer network',          'img' => 'computer-network.png'],
            ['name' => 'DevOps',                    'img' => 'DevOps.png'],
            ['name' => 'Other Categories',          'img' => 'other.png'],
        ];

        foreach ($Main_categories as $main_category) {
            Main_categories::create($main_category);
        }



        $categories = [

            ['name' => 'Python', 'img' => 'python.png', 'main_category_id' => 1],
            ['name' => 'Java', 'img' => 'java.png', 'main_category_id' => 1],
            ['name' => 'JavaScript', 'img' => 'javascript.png', 'main_category_id' => 1],
            ['name' => 'PHP', 'img' => 'php.png', 'main_category_id' => 1],
            ['name' => 'C++', 'img' => 'cpp.png', 'main_category_id' => 1],
            ['name' => 'C#', 'img' => 'csharp.png', 'main_category_id' => 1],
            ['name' => 'Ruby', 'img' => 'ruby.png', 'main_category_id' => 1],
            ['name' => 'Swift', 'img' => 'swift.png', 'main_category_id' => 1],
            ['name' => 'Objective-C', 'img' => 'objective-c.png', 'main_category_id' => 1],
            ['name' => 'Dart', 'img' => 'dart.png', 'main_category_id' => 1],
            ['name' => 'Kotlin', 'img' => 'kotlin.png', 'main_category_id' => 1],
            ['name' => 'Rust', 'img' => 'rust.png', 'main_category_id' => 1],
            ['name' => 'Laravel', 'img' => 'laravel.png', 'main_category_id' => 1],
            ['name' => 'React.js', 'img' => 'react.png', 'main_category_id' => 1],
            ['name' => 'Angular', 'img' => 'angular.png', 'main_category_id' => 1],
            ['name' => 'Django', 'img' => 'django.png', 'main_category_id' => 1],
            ['name' => 'Spring Boot', 'img' => 'spring-boot.png', 'main_category_id' => 1],
            ['name' => '.NET', 'img' => 'dotnet.png', 'main_category_id' => 1],
            ['name' => 'Flutter', 'img' => 'flutter.png', 'main_category_id' => 1],
            ['name' => 'Object-oriented programming', 'img' => 'oop.png', 'main_category_id' => 1],




            ['name' => 'Front-End'  , 'img' => 'front-end.png'  ,'main_category_id' => 2],
            ['name' => 'Back-End'   , 'img' => 'back-end.png'   ,'main_category_id' => 2],
            ['name' => 'Full Stack' , 'img' => 'full-stack.png' ,'main_category_id' => 2],
            ['name' => 'Api'        , 'img' => 'api.png'        ,'main_category_id' => 2],



            // ['name' => 'Kotlin',            'img' => 'kotlin.png','main_category_id' => 3],
            ['name' => 'Android SDK',       'img' => 'Android-SDK.png','main_category_id' => 3],
            // ['name' => 'Flutter',           'img' => 'flutter.png','main_category_id' => 3],
            ['name' => 'iOS SDK',           'img' => 'iOS-SDK.png','main_category_id' => 3],
            ['name' => 'other',             'img' => 'other-mobile-app.png','main_category_id' => 3],
            // ['name' => 'Swift',             'img' => 'swift.png','main_category_id' => 3],
            // ['name' => 'objective-c',       'img' => 'objective-c.png','main_category_id' => 3],
            // ['name' => 'React Native',      'img' => 'react.png','main_category_id' => 3],


            ['name' => 'Data Analysis',                 'img' => 'data-analysis.png', 'main_category_id' => 4],
            ['name' => 'Machine Learning',              'img' => 'machine-learning.png', 'main_category_id' => 4],
            ['name' => 'Modeling and Forecasting',      'img' => 'modeling-forecasting.png', 'main_category_id' => 4],
            ['name' => 'Natural Language Processing',   'img' => 'natural-language-processing.png', 'main_category_id' => 4],
            ['name' => 'Artificial Intelligence',        'img' => 'artificial-intelligence.png', 'main_category_id' => 4],


            ['name' => 'Cyber Attacks and Defenses',      'img' => 'cyber-attacks-defenses.png', 'main_category_id' => 5],
            ['name' => 'Information Security Management', 'img' => 'information-security-management.png', 'main_category_id' => 5],
            ['name' => 'Network and System Security',     'img' => 'network-system-security.png', 'main_category_id' => 5],
            ['name' => 'Application Security',            'img' => 'application-security.png', 'main_category_id' => 5],
            ['name' => 'Cybercrime and Investigations',   'img' => 'cybercrime-investigations.png', 'main_category_id' => 5],
            ['name' => 'Data Security and Privacy',       'img' => 'data-security-privacy.png', 'main_category_id' => 5],



            ['name' => 'Linux', 'img' => 'linux.png', 'main_category_id' => 6],
            ['name' => 'Mac Os', 'img' => 'mac-os.png', 'main_category_id' => 6],
            ['name' => 'Embedded Systems Programming' , 'img' => 'embedded-systems.png', 'main_category_id' => 6],

            ['name' => 'Network Management', 'img' => 'network-management.png', 'main_category_id' => 7],
            ['name' => 'switch and Firewall', 'img' => 'switch-firewall.png', 'main_category_id' => 7],


            ['name' => 'Plan', 'img' => 'plan.png', 'main_category_id' => 8],
            ['name' => 'Code', 'img' => 'code.png', 'main_category_id' => 8],
            ['name' => 'Build', 'img' => 'build.png', 'main_category_id' => 8],
            ['name' => 'Test', 'img' => 'test.png', 'main_category_id' => 8],
            ['name' => 'Release', 'img' => 'release.png', 'main_category_id' => 8],
            ['name' => 'Deploy', 'img' => 'deploy.png', 'main_category_id' => 8],
            ['name' => 'Operate', 'img' => 'operate.png', 'main_category_id' => 8],
            ['name' => 'Monitor', 'img' => 'monitor.png', 'main_category_id' => 8]

        ];






        foreach ($categories as $category) {
            Categories::create($category);
        }

    }
}
