<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPermissions
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    //  Teacher
    public function control_course(User $user )
    {
        return $user->hasPermissionTo('control-course');
    }

    public function control_content(User $user )
    {
        return $user->hasPermissionTo('control-content');
    }

    public function control_comments(User $user )
    {
        return $user->hasPermissionTo('control-comments');
    }

    public function control_projects(User $user )
    {
        return $user->hasPermissionTo('control-projects');
    }

    public function control_articles(User $user )
    {
        return $user->hasPermissionTo('control-articles');
    }




    // Student
    public function create_comments(User $user )
    {
        return $user->hasPermissionTo('create-comments');
    }
    public function create_articles(User $user )
    {
        return $user->hasPermissionTo('create-articles');
    }
    public function create_projects(User $user )
    {
        return $user->hasPermissionTo('create-projects');
    }


    // Admin

    public function control_users(User $user )
    {
        return $user->hasPermissionTo('control-users');
    }


}
