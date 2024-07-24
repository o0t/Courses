<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Courses;
use App\Models\Main_categories;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //  \App\Models\Categories::factory(12)->create();




        $user = User::create([
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

        $user2 = User::create([
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



        $Roles = [
            ['name' => 'member', 'guard_name' => 'web'],
            ['name' => 'student', 'guard_name' => 'web'],
            ['name' => 'teacher', 'guard_name' => 'web'],
            ['name' => 'teacher-admin', 'guard_name' => 'web'],
            ['name' => 'admin', 'guard_name' => 'web'],
        ];

        foreach ($Roles as $RoleData) {
            Role::create($RoleData);
        }


        $permissions = [
            // Course:
            ['name' => 'view-course', 'guard_name' => 'web'],
            ['name' => 'create-course', 'guard_name' => 'web'],
            ['name' => 'edit-course', 'guard_name' => 'web'],
            ['name' => 'delete-course', 'guard_name' => 'web'],

            //  sections
            ['name' => 'view-section', 'guard_name' => 'web'],
            ['name' => 'create-section', 'guard_name' => 'web'],
            ['name' => 'edit-section', 'guard_name' => 'web'],
            ['name' => 'delete-section', 'guard_name' => 'web'],


            //  Contents
            ['name' => 'view-content', 'guard_name' => 'web'],
            ['name' => 'create-content', 'guard_name' => 'web'],
            ['name' => 'edit-content', 'guard_name' => 'web'],
            ['name' => 'delete-content', 'guard_name' => 'web'],

            // Videos:
            ['name' => 'view-video', 'guard_name' => 'web'],
            ['name' => 'upload-video', 'guard_name' => 'web'],
            ['name' => 'edit-video', 'guard_name' => 'web'],
            ['name' => 'delete-video', 'guard_name' => 'web'],
            ['name' => 'open-video', 'guard_name' => 'web'],
            ['name' => 'close-video', 'guard_name' => 'web'],


            // Comments:
            ['name' => 'view-comments', 'guard_name' => 'web'],
            ['name' => 'create-comments', 'guard_name' => 'web'],
            ['name' => 'edit-comments', 'guard_name' => 'web'],
            ['name' => 'delete-comments', 'guard_name' => 'web'],
            ['name' => 'open-comments', 'guard_name' => 'web'],
            ['name' => 'close-comments', 'guard_name' => 'web'],

            // Accounts:
            ['name' => 'view-accounts', 'guard_name' => 'web'],
            ['name' => 'create-accounts', 'guard_name' => 'web'],
            ['name' => 'edit-accounts', 'guard_name' => 'web'],
            ['name' => 'delete-accounts', 'guard_name' => 'web'],
            ['name' => 'open-accounts', 'guard_name' => 'web'],
            ['name' => 'close-accounts', 'guard_name' => 'web'],

        ];

        foreach ($permissions as $permissionData) {
            Permission::create($permissionData);

        }

        // admin
        $role = Role::findByName('admin');
        $permissionNames = array_column($permissions, 'name');

        $role->syncPermissions($permissionNames);
        $user->assignRole($role);

        // teacher

        $RoleTeacher = Role::findByName('teacher');
        $RoleTeacher->givePermissionTo([
            'view-course',
            'create-course',
            'edit-course',
            'delete-course',
            'view-video',
            'upload-video',
            'edit-video',
            'delete-video',
            'open-video',
            'close-video',
            'view-section',
            'create-section',
            'edit-section',
            'delete-section',
            'view-content',
            'create-content',
            'edit-content',
            'delete-content',
        ]);


        $user2->assignRole($RoleTeacher);

        \App\Models\Courses::factory(1)->create();
        \App\Models\AboutCourse::factory(1)->create();




        $Main_categories = [
            ['name' => 'Programming languages',     'img' => 'programming-languages.png'],
            ['name' => 'Web development',           'img' => 'web-development.png'],
            ['name' => 'Mobile app development',    'img' => 'mobile-development.png'],
            ['name' => 'Data science',              'img' => 'data-science.png'],
            ['name' => 'Cybersecurity',             'img' => 'cybersecurity.png'],
            ['name' => 'Operating Systems',         'img' => 'operating-systems.png'],
            ['name' => 'Computer network',          'img' => 'computer-network.png'],
            ['name' => 'DevOps',                    'img' => 'DevOps.png'],
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



            ['name' => 'Kotlin',            'img' => 'kotlin.png','main_category_id' => 3],
            ['name' => 'Android SDK',       'img' => 'Android-SDK.png','main_category_id' => 3],
            ['name' => 'Flutter',           'img' => 'Flutter.png','main_category_id' => 3],
            ['name' => 'iOS SDK',           'img' => 'iOS-SDK.png','main_category_id' => 3],
            ['name' => 'Swift',             'img' => 'Swift.png','main_category_id' => 3],
            ['name' => 'objective-c',       'img' => 'objective-c.png','main_category_id' => 3],
            ['name' => 'React Native',      'img' => 'React-Native.png','main_category_id' => 3],


            ['name' => 'Data Analysis', 'img' => 'data-analysis.png', 'main_category_id' => 4],
            ['name' => 'Machine Learning', 'img' => 'machine-learning.png', 'main_category_id' => 4],
            ['name' => 'Modeling and Forecasting', 'img' => 'modeling-forecasting.png', 'main_category_id' => 4],
            ['name' => 'Natural Language Processing', 'img' => 'natural-language-processing.png', 'main_category_id' => 4],
            ['name' => 'Artificial Intelligence', 'img' => 'artificial-intelligence.png', 'main_category_id' => 4],


            ['name' => 'Cyber Attacks and Defenses', 'img' => 'cyber-attacks-defenses.png', 'main_category_id' => 5],
            ['name' => 'Information Security Management', 'img' => 'information-security-management.png', 'main_category_id' => 5],
            ['name' => 'Network and System Security', 'img' => 'network-system-security.png', 'main_category_id' => 5],
            ['name' => 'Application Security', 'img' => 'application-security.png', 'main_category_id' => 5],
            ['name' => 'Cybercrime and Investigations', 'img' => 'cybercrime-investigations.png', 'main_category_id' => 5],
            ['name' => 'Data Security and Privacy', 'img' => 'data-security-privacy.png', 'main_category_id' => 5],



            ['name' => 'Linux', 'img' => 'linux.png', 'main_category_id' => 6],
            ['name' => 'Mac Os', 'img' => 'mac-os.png', 'main_category_id' => 6],


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
