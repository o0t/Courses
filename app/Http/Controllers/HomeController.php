<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // return $user->getRoleNames();

        if ($user->hasRole('member')) {
            return view('student.home');
        }elseif($user->hasRole('student')){
            return view('student.home');
        }elseif($user->hasRole('teacher')){

            // return view('home');
            return view('teacher.home');
        }elseif($user->hasRole('teacher-admin')){
            return view('teacher.home');

        }elseif($user->hasRole('admin')){
            // return 'this is admin';
            return view('teacher.home');

        }else{
            return 'no';
        }

    }
}
