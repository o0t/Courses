<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherContentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:teacher|teacher-admin']);
    }

    public function index(){
        return view('teacher.content_management');
    }


}
