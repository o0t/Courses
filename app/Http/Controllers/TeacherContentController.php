<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormStartCreateCourse;
use App\Models\Courses;
use App\Models\User;
use App\Policies\UserPermissions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TeacherContentController extends Controller
{

    public function __construct()
    {
        // // $this->middleware(['role:teacher|teacher-admin']);
        // $this->middleware(['can:create-course']);
    }

    public function index(){

        $this->authorize('ViewCourse', Auth::user());

        $Courses = Courses::where('user_id',Auth::user()->id)->get();
        return view('teacher.content.home',compact('Courses'));
    }


    // Create Course
    public function CreateCourse(Request $request){

        $this->authorize('CreateCourse',Auth::user());

        $validator = Validator::make($request->all(), [
            'course-name' => 'required|string|max:50|min:3',
            'level'       => 'in:beginner,intermediate,professional,all',
            'course-url' =>  'required|string|regex:/^[^\s]+$/|max:255|unique:courses,url',
        ], $customMessages = [
            'course-name.required'        => __('The course-name field is required.'),
            'course-name.min'             => __('The course-name must be at least 3 characters.'),
            'course-name.max'             => __('The course-name must not be greater than 50 characters.'),
            'course-url.required'         => __('The course-url field is required.'),
            'course-url.url'              => __('The course-url must be a valid URL.'),
            'course-url.max'              => __('The course-url must not be greater than 255 characters.'),
            'course-url.regex'            => __('The course-url format is invalid.'),
            'course-url.unique'           => __('The course-url has already been taken.'),
        ]);

        if ($validator->fails()) {
            toast(__('Data entry error'),'error');
            return back()->withErrors($validator)->withInput();
        }else{
            toast(__('The course was created successfully'),'success');
        }

        $CreateCourse = Courses::create([
            'user_id'   => Auth::user()->id,
            'name'      => $request->input('course-name'),
            'level'     => $request->input('level'),
            'url'       => $request->input('course-url'),
            'token'     => $request->_token
        ]);

        return back();

    }


    public function CourseDetails($url){

        $CourseDetails = Courses::where('url',$url)->first();

        if (!$CourseDetails) {
            return back();
        }

        return view('teacher.content.course.details',compact('CourseDetails'));
    }


    public function CreateSection(Request $request , $url){

        return $request;

    }

}
