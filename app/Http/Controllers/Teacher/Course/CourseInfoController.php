<?php

namespace App\Http\Controllers\Teacher\Course;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class CourseInfoController extends Controller
{


    public function index(){
        $Courses = Courses::where('user_id',Auth::user()->id)->get();
        return view('teacher.course.home',compact('Courses'));
    }

    public function CourseInfoPage($url){

        $Course = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$Course) {
            return back();
        }

        return view('teacher.course.course_info',compact('Course'));
    }




    public function CourseSettings($url){

        $Course = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$Course) {
            return back();
        }

        $categories = Tag::get();


        return view('teacher.course._course-settings',compact('Course','categories'));

    }


    public function  StudentInteraction ($url){

    // Retrieve the course based on the URL and the authenticated user
        // $course = Courses::where('url', $url)
        //                 ->where('user_id', Auth::user()->id)
        //                 ->first();

        // // Check if the course exists
        // if (!$course) {
        //     return response()->json(['error' => 'Course not found.'], 404);
        // }

        // // Retrieve contents related to the course
        // $contents = $course->content;

        // // Check if there are contents
        // if ($contents->isEmpty()) {
        //     return response()->json(['error' => 'No contents found for this course.'], 404);
        // }

        // // Initialize an array to hold content IDs
        // $contentIds = [];

        // // Loop through each content to get their IDs
        // foreach ($contents as $content) {
        //     $contentIds[] = $content->id; // Collecting all content IDs
        // }

        // // Retrieve likes for all content IDs
        // $likes = Likes::whereIn('content_id', $contentIds)->get();


    }

}
