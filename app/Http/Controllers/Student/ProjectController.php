<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Main_categories;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function CreateProjectPage(){

        $categories = Main_categories::all();
        $courses = Courses::all('title');
        return view('projects.project-create', compact('categories','courses'));
    }



    public function CreateProject(Request $request){

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:50|min:3',
            'description' => 'max:5000',
            'image1'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'courses'      => 'required|exists:courses,title',
        ]);

        if ($validator->fails()) {
            toast(__('Data entry error'), 'error');
            return back()->withErrors($validator)->withInput();
        }

        $course = Courses::where('title', $request->courses)->first();
        $uploadedFiles = [];

        // Process images
        for ($i = 1; $i <= 5; $i++) {
            $imageKey = 'image' . $i;

            if ($request->hasFile($imageKey)) {
                $validatorImage = Validator::make($request->all(), [
                    $imageKey => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                if ($validatorImage->fails()) {
                    return back()->withErrors($validatorImage)->withInput();
                }

                $file = $request->file($imageKey);
                $filename = sprintf('image%d.%s', $i === 1 ? 'out' : $i - 1, Str::uuid() . '-' . time() . '.' . $file->getClientOriginalExtension());

                Storage::disk('minio')->putFileAs('project_images/', $file, $filename);
                $uploadedFiles[$i] = $filename;
            }
        }

        Projects::create([
            'user_id'     => Auth::user()->id,
            'courses_id'  => $course->id,
            'name'        => $request->name,
            'image_out'   => $uploadedFiles[1] ?? null,
            'description' => $request->description,
            'image1'      => $uploadedFiles[2] ?? null,
            'image2'      => $uploadedFiles[3] ?? null,
            'image3'      => $uploadedFiles[4] ?? null,
            'image4'      => $uploadedFiles[5] ?? null,
            'token'       => $request->_token,
        ]);

        toast(__('The project has been created successfully'), 'success');
        return back();

    }


}
