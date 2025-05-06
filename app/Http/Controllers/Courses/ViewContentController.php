<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Courses;
use App\Models\Subscribers;
use App\Models\user_activities;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class ViewContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }





    public function GetContentJquery($name){

        if (config('app.storage_type_data') == 'S3') {

            try {
                // Get the file URL from the 'name' parameter
                $fileUrl = 'http://143.42.49.97:9000/raqeeb/' . $name;

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

        }else{

            $fileContent = Content::where('file_name', $name)->first();

            // Check if the file content is retrieved successfully
            if ($fileContent) {
                $contentData = $fileContent->file_name; // Adjust this based on your actual model structure

                // Detect the MIME type of the file
                $mimeType = $fileContent->extension; // Ensure this is a valid MIME type

                // Set the appropriate content-type header
                header("Content-Type: $mimeType");

                return response()->json([
                    'message' => 'File retrieved successfully.',
                    'mime_type' => $mimeType,
                    'status' => 'success',
                    'file_content' => $contentData, // Encode the content
                ]);
            } else {
                return response()->json([
                    'message' => 'Failed to retrieve the file.',
                    'status' => 'error',
                ], 404);
            }


        }

    }



    public function index($title){

        $course = Courses::where('title',$title)->first();

        $check = Subscribers::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->exists();

        if (!$course && !$check) {
            return back();
        }

        $categories = Tag::get();

        $contents = Content::where('courses_id',$course->id)->get();

        $user_activities = user_activities::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->get()->last();

        $content = Content::where('courses_id',$course->id)->where('serial',$user_activities->serial)->first();

        return view('course.course-content',compact('course','categories','contents','content'));

    }


    public function Get_Content_From_Token($title ,$token){

        $course = Courses::where('title',$title)->first();

        $content = Content::where('token',$token)->first();

        $CreateActivities = user_activities::create([
            'user_id'       => Auth::user()->id,
            'courses_id'    => $course->id,
            'serial'        => $content->serial
        ]);

        return redirect()->route('course.content',compact('title'));
    }


    public function NextPage($title , $token){

        $course = Courses::where('title',$title)->first();

        $user_activities = user_activities::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->get()->last();

        $content = Content::where('token',$token)->first();

        $NextPage = $user_activities->serial + 1;

        $CreateActivities = user_activities::create([
            'user_id'       => Auth::user()->id,
            'courses_id'    => $course->id,
            'serial'        => $NextPage
        ]);

        return redirect()->route('course.content',compact('title'));

    }

    public function PreviousPage($title , $token){

        $course = Courses::where('title',$title)->first();

        $user_activities = user_activities::where('user_id',Auth::user()->id)->where('courses_id',$course->id)->get()->last();

        $content = Content::where('token',$token)->first();

        if ($user_activities->serial != 1) {
            $PreviousPage = $user_activities->serial - 1;

            $CreateActivities = user_activities::create([
                'user_id'       => Auth::user()->id,
                'courses_id'    => $course->id,
                'serial'        => $PreviousPage
            ]);

            return redirect()->route('course.content',compact('title'));
        }else{
            return back();
        }


    }



}
