<?php

namespace App\Http\Controllers\Teacher\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCreateCourse;
use App\Models\AboutCourse;
use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use WindowsAzure\Common\Internal\Atom\Category;

class ManagementController extends Controller
{
    public function __construct()
    {

    }



    public function index(){
        $Courses = Courses::where('user_id',Auth::user()->id)->get();
        return view('teacher.course.home',compact('Courses'));
    }


    /*
    |--------------------------------------------------------------------------
    |           Create function
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    |                           Update function
    |--------------------------------------------------------------------------
    */


    public function CourseSettings($url){

        $Course = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$Course) {
            return back();
        }

        $categories = Categories::all();

        // return $categories;

        return view('teacher.course._course-settings',compact('Course','categories'));

    }


    public function CourseDisplayInformation($url){

        $Course = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$Course) {
            return back();
        }

        return view('teacher.course._course-display',compact('Course'));

    }
    public function CourseSettingsUpdate(Request $request,$url){
        return $request;
    }

    public function CourseDisplayInformationUpdate(Request $request ,$id){


        $validator = Validator::make($request->all(), [
            'introductory_video' => 'nullable|file|mimes:mp4,avi,mov,mkv|max:10240', // Max 10MB
            'course_information' => 'max:5000',
            'recommended_course' => 'max:5000',
            'learn_course'       => 'max:5000',
            'benefits_course'    => 'max:5000',
        ]);


        if ($request->hasFile('introductory_video')) {
            $file = $request->file('introductory_video');
            $extension = $file->getClientOriginalExtension();


            if (($extension === 'mp4' || $extension === 'avi' || $extension === 'mov' || $extension === 'mkv') ) {

                // Store the video
                $path = $file->store('', 'introductory_video');
                $fileName = basename($path);

            }else{
                return back()->withErrors(__('Allowed upload format: mp4, avi, mov, mkv'))->withInput();
            }

            $course = Courses::find($id);

            $course_update = $course->update([
                'introductory_video'    => $fileName,
            ]);

            // introductory_video
        }


        if ($validator->fails()) {
            toast(__('Data entry error'),'error');
            return back()->withErrors($validator)->withInput();
        }else{
            toast(__('Data updated successfully'),'success');
        }

        $AboutCourse = AboutCourse::findOrFail($id);
        $AboutCourse->update($request->except('introductory_video'));

        return back();

    }


}
