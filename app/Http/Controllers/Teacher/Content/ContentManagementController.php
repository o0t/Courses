<?php

namespace App\Http\Controllers\Teacher\Content;


use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Courses;
use App\Models\courses_contents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContentManagementController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    |           index function
    |--------------------------------------------------------------------------
    */

    public function index($url){

        $Course = Courses::with(['content' => function($query) {
            $query->orderBy('serial');
        }, 'content.ContentSection'])

        ->where('url', $url)
        ->where('user_id', Auth::user()->id)
        ->first();
        // ->paginate(20);


        // return $Course;
        return view('teacher.course.content.home', compact('Course'));
    }

    /*
    |--------------------------------------------------------------------------
    |           Create function
    |--------------------------------------------------------------------------
    */

    public function CreateContent(Request $request){

        $Course = Courses::where('url', $request->url)->first();

        if ($request->content_type == 1) {

            return '1';
        }elseif ($request->content_type == 2){

            return 'Upload content 2';
        }elseif ($request->content_type == 3){
            // this is for create Section
            $validator = Validator::make($request->all(), [
                'title_section' => 'required|string|min:2|max:100',
            ]);

            if ($validator->fails()) {
                toast(__('Data entry error'),'error');
                return back()->withErrors($validator)->withInput();
            }

            $section_title = $request->title_section;


            $content = $Course->content()->create([
                'courses_id'    => $Course->id,
                'is_section'    => 'yes',
                'title'         => $section_title,
                'url'           => $section_title,
                'token'         => $request->_token
            ]);


        }


        toast(__('The section was created successfully'),'success');
        return back();

    }


}
