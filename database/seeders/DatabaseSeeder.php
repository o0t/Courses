<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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

            // Videos:
            ['name' => 'view-video', 'guard_name' => 'web'],
            ['name' => 'upload-video', 'guard_name' => 'web'],
            ['name' => 'delete-video', 'guard_name' => 'web'],
            ['name' => 'edit-video', 'guard_name' => 'web'],

            // Comments:
            ['name' => 'view-comments', 'guard_name' => 'web'],
            ['name' => 'create-comments', 'guard_name' => 'web'],
            ['name' => 'delete-comments', 'guard_name' => 'web'],
            ['name' => 'edit-comments', 'guard_name' => 'web'],
            ['name' => 'close-comments', 'guard_name' => 'web'],

            // Accounts:
            ['name' => 'view-accounts', 'guard_name' => 'web'],
            ['name' => 'create-accounts', 'guard_name' => 'web'],
            ['name' => 'edit-accounts', 'guard_name' => 'web'],
            ['name' => 'delete-accounts', 'guard_name' => 'web'],
            ['name' => 'close-accounts', 'guard_name' => 'web'],

        ];

        foreach ($permissions as $permissionData) {
            Permission::create($permissionData);

        }

        $role = Role::findByName('admin');
        $permissionNames = array_column($permissions, 'name');

    }

}
