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
use Spatie\Tags\Tag;
use WindowsAzure\Common\Internal\Atom\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import Str facade

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

        $categories = Tag::get();

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

        $course = Courses::where('url', $url)->where('user_id', Auth::user()->id)->first();

        if (!$course) {
            return back()->with('error', __('Course not found.'));
        }

        // Prepare the input data
        $input = $request->only('title', 'course-url', 'level', 'course_category');

        // Check if the input values have changed
        $hasChanged = $input['title'] !== $course->title ||
                      $input['course-url'] !== $course->url ||
                      $input['level'] !== $course->level ||
                      $input['course_category'] !== optional($course->tags->first())->id;

        // Validate only if values have changed
        if ($hasChanged) {
            $validator = Validator::make($input, [
                'title'             => 'required|string|max:50|min:3',
                'course-url'        => 'required|string|regex:/^[^\s]+$/|max:255|unique:courses,url,' . $course->id,
                'level'             => 'nullable|string|in:beginner,intermediate,professional,all',
                'course_category'   => 'nullable|integer|exists:tags,id',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if ($request->filled('course_category')) {
                // Detach existing tags
                $course->detachTags($course->tags()->pluck('id')->toArray());

                // Get the new tag
                $newTag = Tag::find($input['course_category']);

                // Check if the tag exists before syncing
                if ($newTag) {
                    // Sync the new tag as an array
                    $course->syncTags([$newTag->name]);

                } else {
                    return back()->with('error', __('Tag not found.')); // Handle the case where the tag doesn't exist
                }
            }


            // if ($request->hasFile('image')) {
            //     $uniqueName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            //     $path = Storage::disk('public')->putFileAs('course_img', $request->file('image'), $uniqueName);
            // }else{
            //     $path =  $course->photo;
            // }

            if ($request->hasFile('image')) {
                $uniqueName = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
                $path = Storage::disk('public')->putFileAs('course_img', $request->file('image'), $uniqueName);
                $course->photo = $path; // Update the course's photo path
            } else {
                $path = $course->photo; // Keep the existing photo path
            }


            $course->update([
                'title' => $request->title,
                'level' => $request->level,
                'url'   => $request->input('course-url'), // Use input method for the key with a hyphen
                'photo' => 'storage/'.$path,
            ]);



            toast(__('The course was updated successfully'), 'success');
        } else {
            toast(__('No changes were made'), 'info');
        }

        return back();






        // $Course = Courses::where('url',$url)->where('user_id',Auth::user()->id)->first();

        // if (!$Course) {
        //     return back();
        // }

        // $validator = Validator::make($request->all(), [
        //     'title'             => 'required|string|max:50|min:3',
        //     'course-url"'       => 'required|string|regex:/^[^\s]+$/|max:255|unique:courses,url',
        //     'level'             => 'nullable|string|in:beginner,intermediate,professional,all',
        //     'course_category'   => 'nullable|integer|exists:tags,id',
        // ]);

        // // Validate the request
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        // // First, detach any existing tags
        // $Course->detachTags($Course->tags()->pluck('id')->toArray());

        // // Check if a tag is provided in the request
        // if (!empty($request->course_category)) {
        //     // Get the tag ID from the request
        //     $tagId = $request->course_category;

        //     // Sync the tag using its ID
        //     $Course->syncTags([$tagId]); // Wrap in an array to ensure it's treated as a single tag
        // }

        // toast(__('The course was created successfully'),'success');

        // return back();



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
