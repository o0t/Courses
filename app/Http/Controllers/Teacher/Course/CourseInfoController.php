<?php

namespace App\Http\Controllers\Teacher\Course;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $categories = [
            'Literature', 'History', 'Philosophy', 'Religion', 'Visual/Performing Arts', 'Business & Management', 'Accounting',
            'Finance', 'Marketing', 'Entrepreneurship', 'Operations Management', 'Science & Technology', 'Biology',
            'Computer Science', 'Engineering', 'Mathematics', 'Physics', 'Social Sciences', 'Psychology', 'Sociology',
            'Political Science', 'Economics', 'Anthropology', 'Health & Medicine', 'Nursing', 'Public Health', 'Nutrition',
            'Kinesiology', 'Education & Human Development', 'Teaching', 'Counseling', 'Early Childhood Education',
            'Environment & Sustainability', 'Environmental Science', 'Renewable Energy', 'Conservation', 'Language & Culture',
            'Foreign Languages', 'Linguistics', 'Cultural Studies'
        ];


        return view('teacher.course._course-settings',compact('Course','categories'));

    }
}
