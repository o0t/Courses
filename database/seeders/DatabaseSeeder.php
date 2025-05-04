<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Information;
use App\Models\Main_categories;
use App\Models\Projects;
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

        $this->call([
            RoleSeedr::class,
            TagsSeeder::class,
            UsersSeeder::class,
            CoursesSeeder::class,

        ]);



        // Projects::factory(100)->create();
        // Articles::factory(100)->create();


        Information::create([
            'courses'   => Courses::count(),  // Count of all courses
            'students'  => User::whereHas('roles', function($query) {
                $query->where('name', 'student'); // Adjust based on your role column name
            })->count(),                        // Count of users with 'student' role
            'teachers'  => User::whereHas('roles', function($query) {
                $query->where('name', 'teacher'); // Adjust based on your role column name
            })->count(),                        // Count of users with 'teacher' role
            'Lessons'   => Content::count(),   // Count of all lessons
        ]);

    }

}
