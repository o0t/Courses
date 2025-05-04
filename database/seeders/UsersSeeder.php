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


        $admin = User::create([
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

        $teacher = User::create([
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


        $admin->assignRole('admin');
        $teacher->assignRole('teacher');



        User::factory(50)->create()->each(function ($user) {
            $user->assignRole('teacher'); // Assign the 'teacher' role to each user
        });

        User::factory(854)->create()->each(function ($user) {
            $user->assignRole('student'); // Assign the 'teacher' role to each user
        });


    }
}
