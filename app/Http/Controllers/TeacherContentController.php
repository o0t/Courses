<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormStartCreateCourse;
use App\Models\User;
use App\Policies\UserPermissions;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherContentController extends Controller
{

    public function __construct()
    {
        // // $this->middleware(['role:teacher|teacher-admin']);
        // $this->middleware(['can:create-course']);
    }

    public function index(){
        $this->authorize('ViewCourse', Auth::user());
        return view('teacher.content_management');
    }


    // Create Course
    public function CreateCourse(Request $request){


        $this->authorize('CreateCourse',Auth::user());

        // Validation passed, continue with your logic

        // ...

        return $request;
    }

}
