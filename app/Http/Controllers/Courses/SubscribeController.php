<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Subscribers;
use App\Models\user_activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function subscribe($title){

        $course = Courses::where('title',$title)->first();

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

        $user_activities = user_activities::create([
            'user_id'       => Auth::user()->id,
            'courses_id'    => $course->id,
        ]);

        if ($Subscriber && $user_activities) {
            toast(__('Subscribed successfully'),'success');
        }

        return redirect()->route('course.content',$title);

    }







}
