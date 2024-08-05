<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class ViewContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index($name){

        $course = Courses::where('name',$name)->first();

        return $course->Section;



    }

}
