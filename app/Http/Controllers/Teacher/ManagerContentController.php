<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\Videos;
use App\Models\Txt;
use App\Models\Pdf;
use Illuminate\Support\Facades\Auth;

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

        return $request;

    }


    public function ViewContent ($id){

    }


}
