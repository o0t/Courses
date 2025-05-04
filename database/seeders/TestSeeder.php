<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // testing
        $testing = User::create([
            'first_name' => 'testing',
            'last_name' => 'Developer',
            'username' => 'testing',
            'email' => 'testing@testing.com',
            'phone' => 123456789,
            'about' => 'I am a web developer.',
            'email_verified_at' => null,
            'password' => bcrypt('testing@testing.com'),
            'remember_token' => null,
        ]);



        // $testing->assignRole('admin');
        // $testing->assignRole('teacher');
        // $testing->assignRole('student');


    }
}
