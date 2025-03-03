<?php

namespace Database\Seeders;

use App\Models\AboutCourse;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Information;
use App\Models\Main_categories;
use App\Models\Projects;
use App\Models\User;
use Database\Factories\AboutCourseFactory;
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

        // This is for testing only
        Information::create([
            'courses'   => 95,
            'students'  => '599',
            'teachers'  => '120',
            'Lessons'  => '1530',
        ]);

        $this->call([
            UsersSeeder::class,
            CategoriesSeeder::class,
            CoursesSeeder::class
        ]);


        AboutCourse::factory(7)->create();

        // $course = Courses::factory()
        // ->create();
        $course = Courses::find(1); // Replace $courseId with the actual ID


        $course->content()->createMany(
            Content::factory()->count(50)->make()->toArray()
        );

        Projects::factory(100)->create();
        Articles::factory(100)->create();



    }

}
