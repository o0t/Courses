<?php

namespace Database\Seeders;

use App\Models\AboutCourse;
use App\Models\Categories;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Main_categories;
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



    }

}
