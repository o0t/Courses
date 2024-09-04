<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function subscribe($name){

        $course = Courses::where('name',$name)->first();

        if (!$course) {
            return back();
        }

        $check = Subscribers::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->exists();

        if ($check) {
            return back();
        }

        $Subscriber = Subscribers::create([
            'user_id'       => Auth::user()->id,
            'courses_id'    => $course->id,
        ]);

        if ($Subscriber) {
            toast(__('Subscribed successfully'),'success');
        }

        return redirect()->route('course.content',$name);

    }







}
