<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Subscribers;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\Tag;

class ViewCoursesController extends Controller
{


    public function Get_Introductory_Video($name) {

        if (config('app.storage_type_data') == 'S3') {

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
        }else{

            // $Course = Courses::where('introductory_video',$name)->first();


            // if ($Course) {
            //     $extension = pathinfo($Course->introductory_video, PATHINFO_EXTENSION);

            //     return response()->json([
            //         'message' => 'File retrieved successfully.',
            //         'mime_type' => $extension,
            //         'status' => 'success',
            //         'file_content' => base64_encode($fileContent),
            //     ]);
            // }else{
            //     return response()->json(['message' => 'Failed to retrieve the file.', 'status' => 'error']);
            // }



            // if ($Course) {
            //     // Assuming the introductory_video contains the path to the file
            //     $file = $Course->introductory_video;

            //     // Check if the file exists
            //     if (Storage::disk('introductory_video')->exists($file)) {

            //         return response()->json([
            //             'message' => 'File retrieved successfully.',
            //             'mime_type' => $file->getClientOriginalExtension(),
            //             'status' => 'success',
            //             'file_content' => base64_encode($file),
            //         ]);

            //     } else {
            //         return response()->json(['message' => 'File does not exist.', 'status' => 'error']);
            //     }
            // } else {
            //     return response()->json(['message' => 'Failed to retrieve the file.', 'status' => 'error']);
            // }

        }


    }

    public function index($title){

        $course = Courses::where('url',$title)->first();

        if (!$course) {
            return back();
        }

        $categories = Tag::get();

        if (Auth::check()) {

            $check = Subscribers::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->exists();

            $btn_subscriber = $check;

        }else{

            $btn_subscriber = NULL;
        }

        if ($course->introductory_video != null) {
            // Assuming introductory_video is a string path in the database
            $videoPath = 'public/introductory_video/' . $course->introductory_video;

            // Check if the file exists
            if (Storage::exists($videoPath)) {
                $extension = pathinfo($videoPath, PATHINFO_EXTENSION);
            }else{
                $extension = null;
            }
        }else{
            $extension = null;
        }

        return view('course.home',compact('categories','course','btn_subscriber','extension'));

    }






}
