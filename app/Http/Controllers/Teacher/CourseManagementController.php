<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCreateCourse;
use App\Http\Requests\FormStartCreateCourse;
use App\Models\AboutCourse;
use App\Models\Content;
use App\Models\Courses;
use App\Models\User;
use App\Policies\UserPermissions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


class CourseManagementController extends Controller
{
    public function __construct()
    {

    }


    /*
        =============================================================================================
                                        Course
        =============================================================================================
    */

    public function index(){

        $Courses = Courses::where('user_id',Auth::user()->id)->get();
        return view('teacher.course.home',compact('Courses'));
    }


    public function CreateCourse(FormCreateCourse $request){

        $CreateCourse = Courses::create([
            'user_id'   => Auth::user()->id,
            'title'      => $request->input('course-title'),
            'level'     => $request->input('level'),
            'url'       => $request->input('course-url'),
            'token'     => $request->_token
        ]);

        AboutCourse::create([
            'course_id'     => $CreateCourse->id
        ]);


        toast(__('The course was created successfully'),'success');
        return back();
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

    public function CourseSettingsUpdate(Request $request,$url){
        return $request;
    }

    /*
        =============================================================================================
                                        Content display settings
        =============================================================================================
    */

        public function ContentDisplaySettings($url){

            $Course = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

            if (!$Course) {
                return back();
            }

            return view('teacher.course._content-display-settings',compact('Course'));

        }

        public function ContentDisplaySettingsUpdate(Request $request ,$id){

            $validator = Validator::make($request->all(), [
                'course_information'        =>  'max:5000',
                'recommended_course'        =>  'max:5000',
                'learn_course'              =>  'max:5000',
                'benefits_course'            =>  'max:5000',
            ]);


            if ($validator->fails()) {
                toast(__('Data entry error'),'error');
                return back()->withErrors($validator)->withInput();
            }else{
                toast(__('Data updated successfully'),'success');
            }

            $AboutCourse = AboutCourse::findOrFail($id);

            $AboutCourse->update($request->all());

            return back();

        }


}
