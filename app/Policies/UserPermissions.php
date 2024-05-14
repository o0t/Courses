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

    //  ! Course

    public function ViewCourse(User $user )
    {
        return $user->hasPermissionTo('view-course');
    }

    public function CreateCourse(User $user )
    {
        return $user->hasPermissionTo('create-course');
    }

    public function EditCourse(User $user )
    {
        return $user->hasPermissionTo('edit-course');
    }

    public function DeleteCourse(User $user )
    {
        return $user->hasPermissionTo('delete-course');
    }

    // ! video

    public function ViewVideo(User $user )
    {
        return $user->hasPermissionTo('view-video');
    }

    public function UploadVideo(User $user )
    {
        return $user->hasPermissionTo('upload-video');
    }

    public function EditVideo(User $user )
    {
        return $user->hasPermissionTo('edit-video');
    }

    public function DeleteVideo(User $user )
    {
        return $user->hasPermissionTo('delete-video');
    }

    public function OpenVideo(User $user )
    {
        return $user->hasPermissionTo('open-video');
    }

    public function CloseVideo(User $user )
    {
        return $user->hasPermissionTo('close-video');
    }


    // ! Comments

    public function ViewComments(User $user )
    {
        return $user->hasPermissionTo('view-comments');
    }

    public function CreateComments(User $user )
    {
        return $user->hasPermissionTo('create-comments');
    }

    public function EditComments(User $user )
    {
        return $user->hasPermissionTo('edit-comments');
    }

    public function DeleteComments(User $user )
    {
        return $user->hasPermissionTo('delete-comments');
    }

    public function OpenComments(User $user )
    {
        return $user->hasPermissionTo('open-comments');
    }

    public function CloseComments(User $user )
    {
        return $user->hasPermissionTo('close-comments');
    }

    // ! Accounts

    public function ViewAccounts(User $user )
    {
        return $user->hasPermissionTo('view-accounts');
    }

    public function CreateAccounts(User $user )
    {
        return $user->hasPermissionTo('create-accounts');
    }

    public function EditAccounts(User $user )
    {
        return $user->hasPermissionTo('edit-accounts');
    }

    public function DeleteAccounts(User $user )
    {
        return $user->hasPermissionTo('delete-accounts');
    }

    public function OpenAccounts(User $user )
    {
        return $user->hasPermissionTo('open-accounts');
    }

    public function CloseAccounts(User $user )
    {
        return $user->hasPermissionTo('close-accounts');
    }

}
