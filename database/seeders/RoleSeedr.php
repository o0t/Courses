<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


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


        // teacher
        $RoleTeacher = Role::findByName('teacher');
        $RoleTeacher->givePermissionTo([
            'control-course',
            'control-content',
            'control-comments',
            'control-articles',
            'control-projects',
        ]);

        // student
        $RoleStudent = Role::findByName('student');
        $RoleStudent->givePermissionTo([
            'create-comments',
            'create-articles',
            'create-projects',
        ]);



    }
}
