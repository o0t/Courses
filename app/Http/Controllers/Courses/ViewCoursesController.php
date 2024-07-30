<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Main_categories;
use Illuminate\Http\Request;

class ViewCoursesController extends Controller
{


    public function index($name){

        $course = Courses::where('name',$name)->first();

        if (!$course) {
            return back();
        }

        $categories = Main_categories::all();

        return view('course.home',compact('categories','course'));

    }
}
