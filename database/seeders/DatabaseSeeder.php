<?php

namespace Database\Seeders;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Information;
use App\Models\Likes;
use App\Models\Likes_comments;
use App\Models\Main_categories;
use App\Models\Projects;
use App\Models\Reply_comments;
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
            // CoursesSeeder::class,
            TestSeeder::class,

        ]);


        Comments::factory(5000)->create();

        Projects::factory(100)->create();
        Articles::factory(100)->create();


        Information::create([
            'courses'   => Courses::count(),
            'students'  => User::whereHas('roles', function($query) {
                $query->where('name', 'student');
            })->count(),
            'teachers'  => User::whereHas('roles', function($query) {
                $query->where('name', 'teacher');
            })->count(),
            'Lessons'   => Content::count(),
        ]);

    }

}
