<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Main_categories;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function index(){
        $categories = Main_categories::all();
        return view('welcome' , compact('categories'));
    }


    public function category($category){

        $Main_category = Main_categories::where('name',$category)->first();

        if ($Main_category) {
            $category = Categories::where('main_category_id',$Main_category->id)->get();

        }else{
            return back();
        }

        $categories = Main_categories::all();

        return view('category',compact('Main_category','category','categories'));


    }

}
