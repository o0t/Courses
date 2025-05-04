<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Main_categories;
use App\Models\User;
use App\Models\Courses;
use App\Models\Content;
use App\Models\Information;
use App\Models\Projects;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Tags\Tag;

class PagesController extends Controller
{


    public function index(){
        $categories = Tag::get();
        $Information = Information::find(1);
        return view('welcom' , compact('categories','Information'));
    }


    public function category($category){

        $tag = Tag::where('name->en',$category)->first();

        if ($tag) {
            $Courses = Courses::withAnyTags([$tag->getTranslation('name', 'en')])->paginate(20);
        }else{
            return back();
        }

        $categories = Tag::get();
        $status = null;


        return view('category-courses',compact('status','Courses','categories','category'));

    }



    public function LatestCategoryCourses($category){

        $tag = Tag::where('name->en',$category)->first();

        if ($tag) {
            $Courses = Courses::withAnyTags([$tag->getTranslation('name', 'en')])->latest()->paginate(20);
        }else{
            return back();
        }

        $categories = Tag::get();
        $status = 'latest';

        return view('category-courses',compact('status','Courses','categories','category'));

    }


    public function OldestCategoryCourses($category){

        $tag = Tag::where('name->en',$category)->first();

        if ($tag) {
            $Courses = Courses::withAnyTags([$tag->getTranslation('name', 'en')])->oldest()->paginate(20);
        }else{
            return back();
        }

        $categories = Tag::get();
        $status = 'oldest';

        return view('category-courses',compact('status','Courses','categories','category'));

    }



    public function Projects(){

        $categories = Tag::get();

        $Projects = Projects::with('user')->orderBy('created_at', 'DESC')->paginate(15);

        return view('projects.home',compact('categories','Projects'));
    }

    public function Articles(){

        $categories = Tag::get();

        $Articles = Articles::with('user')->orderBy('created_at', 'DESC')->paginate(15);


        return view('articles.home',compact('categories','Articles'));
    }


    public function ArticleDetails($token){

        $categories = Tag::get();

        $Article = Articles::with('user')->where('token',$token)->first();

        return view('articles.article-details',compact('categories','Article'));

    }


    public function ProjectDetails($token){

        $Project = Projects::where('token',$token)->first();

        $categories = Tag::get();

        $Course = Courses::find($Project->id);

        return view('projects.project-details', compact('categories','Project','Course'));

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


    public function FormSearchCourses(Request $request){

        $validator = Validator::make($request->all(), [
            'search'    => 'required|string|max:200|min:2',
        ]);

        if ($validator->fails()) {
            toast(__('Data entry error'), 'error');
            return back()->withErrors($validator)->withInput();
        }
        $categories = Tag::get();

        $course = Courses::where("title","like","%".$request->search."%")->with('Categories')->get();

        return response()->json($course);
    }

}
