<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Main_categories;
use App\Models\User;
use App\Models\Courses;
use App\Models\Content;
use App\Models\Projects;
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



    public function CategoryCourses($category){

        $Categories = Categories::where('name',$category)->first();
        if ($Categories) {
            $Courses = $Categories->Courses;
            $categories = Main_categories::all();
        }else{
            return back();
        }

        return view('category-courses', compact('categories','Categories','Courses'));
    }


    public function Projects(){
        $categories = Main_categories::all();

        $Projects = Projects::with('user')->orderBy('created_at', 'DESC')->paginate(15);


        return view('projects.home',compact('categories','Projects'));
    }

}
