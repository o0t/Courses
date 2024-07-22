<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function index(){

        $categories = Categories::all();
        return view('welcome' , compact('categories'));
    }

}
