<?php

namespace App\Http\Controllers\Teacher\Content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Courses;
use App\Models\courses_contents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{


        public function index($url){

            $Course = Courses::with(['content' => function($query) {
                $query->orderBy('serial');
            }, 'content.ContentSection'])

            ->where('url', $url)
            ->where('user_id', Auth::user()->id)
            ->first();

            return view('teacher.course.content.home', compact('Course'));
        }


        public function CreateContent(Request $request){

            $Course = Courses::where('url', $request->url)->first();

            if ($request->content_type == 1) {


            }elseif ($request->content_type == 2){

                return 'Upload content 2';
            }elseif ($request->content_type == 3){

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




        }


}
