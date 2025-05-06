<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(50)->create()->each(function ($user) {
        //     $user->assignRole('teacher'); // Assign the 'teacher' role to each user
        // });

        // User::factory(854)->create()->each(function ($user) {
        //     $user->assignRole('student'); // Assign the 'teacher' role to each user
        // });


    }
}
