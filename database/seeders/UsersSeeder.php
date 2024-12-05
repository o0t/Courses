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
            ['name' => 'admin', 'guard_name' => 'web'],
        ];

        foreach ($Roles as $RoleData) {
            Role::create($RoleData);
        }


        $permissions = [

            // teacher:
            ['name' => 'control-course', 'guard_name' => 'web'],
            ['name' => 'control-content', 'guard_name' => 'web'],
            ['name' => 'control-comments', 'guard_name' => 'web'],
            ['name' => 'control-articles', 'guard_name' => 'web'],
            ['name' => 'control-projects', 'guard_name' => 'web'],

            // student:
            ['name' => 'create-comments', 'guard_name' => 'web'],
            ['name' => 'create-articles', 'guard_name' => 'web'],
            ['name' => 'create-projects', 'guard_name' => 'web'],

            ['name' => 'control-users', 'guard_name' => 'web'],


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
            'control-course',
            'control-content',
            'control-comments',
            'control-articles',
            'control-projects',
        ]);


        $user2->assignRole($RoleTeacher);



        User::factory(50)->create();

    }
}
