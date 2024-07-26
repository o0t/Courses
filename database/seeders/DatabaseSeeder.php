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


        $this->call([
            UsersSeeder::class,
            CategoriesSeeder::class
        ]);





    }

}
