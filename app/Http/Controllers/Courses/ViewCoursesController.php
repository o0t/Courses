<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Http\Request;

class ViewCoursesController extends Controller
{



    public function index(){

            // Attach a category to a course
            $course = Courses::find(1);
            $category = Categories::find(1);
            $course->categories()->attach($category->id);

            // Retrieve the categories for the course
            $categories = $course->categories;

            // Retrieve the courses for the category
            $courses = $category->courses;

            return $courses;

    }
}
