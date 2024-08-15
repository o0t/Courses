<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Courses;
use App\Models\courses_contents;
use Illuminate\Http\Request;
use App\Models\Videos;
use App\Models\Txt;
use App\Models\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManagerContentController extends Controller
{



    /*
        =============================================================================================
                                            Course Content
        =============================================================================================
    */


    // View Course Content
    public function Contents($url){

        $Course = Courses::where('url', $url)->where('user_id', Auth::user()->id)->with('Content')->first();

        if (!$Course) {
            return back();
        }

        if ($Course->Content->isEmpty()) {
            $Contents = NULL;
        }else{
            $Contents = $Course->Content()->paginate(15);

        }


        return view('teacher.content.course._course-content',compact('Course','Contents'));
    }


    public function CreateContent(Request $request , $url){
        // return $request;


        $Course = Courses::where('url',$url)->first();


        if ($request->content_type == 1) {

            // Content writing
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|min:2|max:100',
                'txt-content' => 'required|min:10|max:500',
            ]);

            if ($validator->fails()) {
                // return response()->json(['errors' => $validator->errors()], 422);
                toast(__('Data entry error'),'error');
                return back()->withErrors($validator)->withInput();
            }

            $allow_comments = $request->allow_comments == "on" ? 'yes' : 'no';

            $content = $Course->content()->create([
                'courses_id' => $Course->id,
                'title' => $request->input('title'),
                'content' => $request->input('txt-content'),
                'type' => 'txt',
                'allow_comments' => $allow_comments,
            ]);

            toast(__('Content created successfully'),'success');
            return back();


        }elseif($request->content_type == 2){
            // Upload content

        }

        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|string|min:2|max:100',
        //     'file-video' => 'required|mimes:mp4,mov|max:202400',
        //     'description' => 'max:255',
        // ]);


        // if ($validator->fails()) {
        //     toast(__('Data entry error'), 'error');
        //     return back()->withErrors($validator)->withInput();
        // }


        // return $request;

    }


    public function ViewContent ($id){

    }


}
