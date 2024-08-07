<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }



    public function content()
    {
        return $this->belongsToMany(Content::class, 'courses_contents');
    }

    public function AboutCourse(){
        return $this->hasOne(AboutCourse::class , 'course_id','id');
    }

    public function Subscribers()
    {
        return $this->hasMany(Subscribers::class, 'id', 'course_id');
    }

    public function Categories()
    {
        return $this->belongsToMany(Categories::class, 'courses_categories', 'course_id', 'category_id');
    }
}
