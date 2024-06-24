<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormStartCreateCourse;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Section;
use App\Models\section_content;
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


    public function CourseHome($url){

        $this->authorize('ViewSection',Auth::user());

        $CourseDetails = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$CourseDetails) {
            return back();
        }

        return view('teacher.content.course.course_info',compact('CourseDetails'));
    }



    // View Sections
    public function Sections($url){

        $this->authorize('ViewSection',Auth::user());

        $CourseDetails = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$CourseDetails) {
            return back();
        }

        $Sections = $CourseDetails->Section()->paginate(15);

        return view('teacher.content.course.sections',compact('CourseDetails','Sections'));
    }


    public function CreateSections(Request $request , $url){

        $this->authorize('CreateSection',Auth::user());


        $CourseDetails = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        if (!$CourseDetails) {
            return back();
        }

        if (!Section::where('courses_id',$CourseDetails->id)->first()) {

            $validator = Validator::make($request->all(), [
                'section-name' => 'required|string|max:50|min:3',
            ], $customMessages = [
                'section-name' => __('You do not have any previous sections. You must write the name of the section'),
            ]);

            if ($validator->fails()) {
                toast(__('Data entry error'),'error');
                return back()->withErrors($validator)->withInput();
            }else{
                toast(__('The course was created successfully'),'success');
            }


        }

        $CreateSection = Section::create([
            'courses_id'      => $CourseDetails->id,
            'name'            => $request->input('section-name'),
            'token'           => $request->_token

        ]);

        $Content = Content::create([
            'section_id'    => $CreateSection->id
        ]);

        if ($CreateSection) {

            section_content::create([
                'section_id'      => $CreateSection->id,
                'content_id'      => $Content->id,
            ]);

            toast(__('The Section been created successfully'),'success');
        }else{
            toast(__('There is a problem, please try again later'),'error');
        }

        return back();

    }

    // view Section
    public function ViewSection ($id){

        $this->authorize('ViewContent',Auth::user());


        $section = Section::findOrFail($id);
        $contents = $section->Content()
                            ->with(['videos', 'Txt', 'pdf', 'test'])
                            ->orderByDesc('created_at')
                            ->first();

        // return $contents;
        return view('teacher.content.course.view_section',compact('section','contents'));
    }

}
