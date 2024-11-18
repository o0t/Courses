<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses_categories extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'courses_categories';

    public function Courses()
    {
        return $this->belongsTo(Courses::class , 'course_id');
    }

    public function Categories()
    {
        return $this->belongsTo(Categories::class , 'category_id');
    }



}
