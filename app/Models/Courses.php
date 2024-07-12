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



    public function Section()
    {
        return $this->hasMany(Section::class, 'courses_id', 'id');
    }

    public function AboutCourse(){
        return $this->hasOne(AboutCourse::class , 'course_id','id');
    }

    public function Subscribers()
    {
        return $this->hasMany(Subscribers::class, 'course_id', 'id');
    }

}
