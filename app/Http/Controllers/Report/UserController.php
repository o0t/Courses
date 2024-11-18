<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Main_categories;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index(){

        $categories = Main_categories::all();

        // return view('report.home',compact('categories'));
        return view('report.create-repoort',compact('categories'));
    }

}
