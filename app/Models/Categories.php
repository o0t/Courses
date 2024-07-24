<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Courses()
    {
        return $this->belongsToMany(Courses::class, 'courses_categories', 'category_id', 'course_id');
    }


    public function main_category()
    {
        return $this->belongsTo(Main_categories::class, 'main_category_id');
    }
}
