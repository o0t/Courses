<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Main_categories;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewCoursesController extends Controller
{


    public function index($name){

        $course = Courses::where('name',$name)->first();

        if (!$course) {
            return back();
        }

        $categories = Main_categories::all();

        if (Auth::check()) {

            $check = Subscribers::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->exists();

            $btn_subscriber = $check;

        }else{

            $btn_subscriber = NULL;
        }

        return view('course.home',compact('categories','course','btn_subscriber'));

    }






}
