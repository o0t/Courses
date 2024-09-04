<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Main_categories;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index($name){

        $course = Courses::where('name',$name)->first();

        if (!$course) {
            return back();
        }

        $check = Subscribers::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->exists();

        $categories = Main_categories::all();


        if ($course->content->isEmpty()) {
            $content = null ;
        }else{
            $content = $course->content;
        }


        if (!$check) {
            return back();
        }


        return view('course.course-content',compact('course','categories','content'));

    }

}
