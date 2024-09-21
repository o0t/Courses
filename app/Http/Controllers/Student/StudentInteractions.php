<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentInteractions extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function LikeContent($token){

        $content = Content::where('token',$token)->first();

        if (!$content || !$token) {
            return back();
        }


        $like = Likes::where('user_id', Auth::user()->id)
              ->where('content_id', $content->id)
              ->first();

        if ($like) {
            $like->delete();

            toast(__('The like has been removed successfully'), 'success');

        }else{
            Likes::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
            ]);

            toast(__('You have been successfully liked'), 'success');
        }

        return back();

    }


}
