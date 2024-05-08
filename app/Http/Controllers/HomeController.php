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
            return view('layouts.Student');
        }elseif($user->hasRole('student')){
            return 'this is student';
        }elseif($user->hasRole('teacher')){
            return 'this is teacher';
        }elseif($user->hasRole('teacher-admin')){
            return 'this is teacher-admin';
        }elseif($user->hasRole('admin')){
            return 'this is admin';
        }else{
            return 'no';
        }

    }
}
