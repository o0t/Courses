<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Courses(){
        return $this->hasMany(Courses::class,'id','user_id');
    }

    public function Subscribers()
    {
        return $this->hasMany(Subscribers::class, 'user_id', 'id');
    }

    public function Comments(){
        return $this->hasMany(Comments::class,'user_id','id');
    }

    public function Likes(){
        return $this->hasMany(Likes::class,'user_id','id');
    }

    public function hasLiked($contentId)
    {
        return $this->Likes()->where('content_id', $contentId)->exists();
    }

    public function Archive(){
        return $this->hasMany(Archive::class,'user_id','id');
    }

    public function hasArchive($contentId)
    {
        return $this->Archive()->where('content_id', $contentId)->exists();
    }

    public function Note(){
        return $this->hasMany(Note::class,'user_id','id');
    }

    public function hasNote($contentId)
    {
        return $this->Note()->where('content_id', $contentId)->exists();
    }

    public function ShowNote($contentId)
    {
        return $this->Note()->where('content_id', $contentId)->first();
    }

    public function Likes_comments(){
        return $this->hasMany(Likes_comments::class,'user_id','id');
    }

    public function hasLikes_comments($contentId , $commentId)
    {
        return $this->Likes_comments()->where('content_id', $contentId)->where('comment_id', $commentId)->exists();
    }

    public function Projects(){
        return $this->hasMany(Projects::class,'user_id','id');
    }

    public function Articles(){
        return $this->hasMany(Articles::class,'user_id','id');
    }
}
