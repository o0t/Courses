<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Main_categories;
use App\Models\Subscribers;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewCoursesController extends Controller
{


    public function Get_Introductory_Video($name) {
        try {
            $fileUrl = 'http://143.42.49.97:9000/raqeeb/introductory_video/' . $name; // Added '/'

            // Get the file content
            $fileContent = @file_get_contents($fileUrl); // Use @ to suppress errors

            // Check if the file content is retrieved successfully
            if ($fileContent !== false) {
                // Create a new finfo resource to detect the MIME type
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->buffer($fileContent);

                return response()->json([
                    'message' => 'File retrieved successfully.',
                    'mime_type' => $mimeType,
                    'status' => 'success',
                    'file_content' => base64_encode($fileContent),
                ]);
            } else {
                return response()->json(['message' => 'Failed to retrieve the file.', 'status' => 'error']);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'An error occurred: ' . $th->getMessage(), 'status' => 'error']);
        }
    }

    public function index($name){

        $course = Courses::where('name',$name)->first();

        if (!$course) {
            return back();
        }

        $categories = Main_categories::all();

        if (Auth::check()) {

            $check = Subscribers::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->exists();

            $btn_subscriber = $check;

        }else{

            $btn_subscriber = NULL;
        }


        return view('course.home',compact('categories','course','btn_subscriber'));

    }






}
