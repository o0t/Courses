<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Main_categories;
use App\Models\User;
use App\Models\Courses;
use App\Models\Content;
use App\Models\Projects;
use finfo;
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



    public function LatestCategoryCourses($category){

        $Categories = Categories::where('name', $category)->first();

        if (!$Categories) {
            return back();
        }

        $Courses = $Categories->courses()->latest()->paginate(10);
        $categories = Main_categories::all();
        $status = 'latest';

        return view('category-courses', compact('categories','Categories','Courses','status','category'));
    }


    public function OldestCategoryCourses($category){

        $Categories = Categories::where('name', $category)->first();

        if (!$Categories) {
            return back();
        }

        $Courses = $Categories->courses()->oldest()->paginate(10);
        $categories = Main_categories::all();
        $status = 'oldest';

        return view('category-courses', compact('categories','Categories','Courses','status','category'));

    }



    public function Projects(){

        $categories = Main_categories::all();

        $Projects = Projects::with('user')->orderBy('created_at', 'DESC')->paginate(15);

        return view('projects.home',compact('categories','Projects'));
    }

    public function Articles(){

        $categories = Main_categories::all();

        $Articles = Articles::with('user')->orderBy('created_at', 'DESC')->paginate(15);

        return view('articles.home',compact('categories','Articles'));
    }


    public function ArticleDetails($token){

        $categories = Main_categories::all();

        $Article = Articles::with('user')->where('token',$token)->first();

        return view('articles.article-details',compact('categories','Article'));

    }


    public function ProjectDetails($token){

        $Project = Projects::where('token',$token)->first();

        $categories = Main_categories::all();

        return view('projects.project-details', compact('categories','Project'));

    }


    public function ArticleImages($name){

        try {
            // Get the file URL from the 'name' parameter
            $fileUrl = 'http://143.42.49.97:9000/raqeeb/article_images/' . $name;

            // Get the file content
            $fileContent = file_get_contents($fileUrl);

            // Check if the file content is retrieved successfully
            if ($fileContent !== false) {
                // Create a new finfo resource to detect the MIME type
                $finfo = new finfo(FILEINFO_MIME_TYPE);

                // Detect the MIME type of the file
                $mimeType = $finfo->buffer($fileContent);
                // Set the appropriate content-type header
                header("Content-Type: $mimeType");

                // Output the file content
                // echo $fileContent;

                return response()->json([
                    'message' => 'File retrieved successfully.',
                    'mime_type' => $mimeType,
                    'status' => 'success',
                    'file_content' => base64_encode($fileContent), // Optionally encode the content
                ]);

            } else {
                echo "Failed to retrieve the file.";
            }

        } catch (\Throwable $th) {
            return false;
        }
    }


    public function ProjectImages($name){

        try {
            // Get the file URL from the 'name' parameter
            $fileUrl = 'http://143.42.49.97:9000/raqeeb/project_images/' . $name;

            // $fileUrl = 'http://143.42.49.97:9000/raqeeb/d195194e-d9fe-44d9-b4f6-7a83c438d41a-1725947301.mp4';

            // Get the file content
            $fileContent = file_get_contents($fileUrl);

            // Check if the file content is retrieved successfully
            if ($fileContent !== false) {
                // Create a new finfo resource to detect the MIME type
                $finfo = new finfo(FILEINFO_MIME_TYPE);

                // Detect the MIME type of the file
                $mimeType = $finfo->buffer($fileContent);
                // Set the appropriate content-type header
                header("Content-Type: $mimeType");

                // Output the file content
                // echo $fileContent;

                return response()->json([
                    'message' => 'File retrieved successfully.',
                    'mime_type' => $mimeType,
                    'status' => 'success',
                    'file_content' => base64_encode($fileContent), // Optionally encode the content
                ]);

            } else {
                echo "Failed to retrieve the file.";
            }

        } catch (\Throwable $th) {
            return false;
        }
    }



}
