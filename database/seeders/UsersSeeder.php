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



    }
}
