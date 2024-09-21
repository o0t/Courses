<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Content;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



        public function CreateComment(Request $request, $token) {

        $content = Content::with('Comments.user')->where('token', $token)->first();

        if ($content && $content->courses->isNotEmpty()) {
            $courseTitle = $content->courses[0]->title; // Access the title of the first course
            $title = $courseTitle;
        } else {
            return back();
        }

        $validator = Validator::make($request->all(), [
            'comment'        =>  'required|max:5000',
        ]);

        if ($validator->fails()) {
            toast(__('Data entry error'),'error');
            return back()->withErrors($validator)->withInput();
        }else{
            toast(__('Data updated successfully'),'success');
        }

        $CreateComment = Comments::create([
            'user_id'       => Auth::user()->id,
            'content_id'    => $content->id,
            'comment'       => $request->comment,
            'token'         => $request->_token,
        ]);


            return redirect()->route('course.content',compact('title'));

        }
}
