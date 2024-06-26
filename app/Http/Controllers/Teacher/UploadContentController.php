<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Txt;
use App\Models\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class UploadContentController extends Controller
{
    public function __construct()
    {

    }


    public function upload_video (Request $request,$section_id ,$content_id){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:100',
            'file-video' => 'required|mimes:mp4,mov|max:202400',
            'description' => 'max:255',
        ]);


        if ($validator->fails()) {
            toast(__('Data entry error'), 'error');
            return back()->withErrors($validator)->withInput();
        } else {


            // Get the file from the request
            $file = $request->file('file-video');

            // Generate a unique filename
            $filename = Str::uuid() . '-'.Auth::user()->id .'.' . $file->getClientOriginalExtension();
            // $filename = time() . '_' . $file->getClientOriginalName();


            // Upload the file to the Minio bucket
            $filePath = Storage::disk('minio')->putFileAs('videos', $file, $filename);

            // Get the public URL of the uploaded file
            $fileUrl = Storage::disk('minio')->url($filePath);


            $shearing_guests = $request->special_for == 'private' ? 'private' : 'general';
            $status = $request->publication_status == 'private' ? 'private' : 'general';

            $validatedData = $validator->validated();

            $Videos = Videos::create([
                'content_id'         => $content_id,
                'video_name'         => $validatedData['title'],
                'file_name'           => $filename,
                'url_video'          => $fileUrl,
                'description'        => $validatedData['description'],
                'status'             => $request->publication_status,
                'shearing_guests'    => $shearing_guests,
            ]);



            toast(__('The video has been uploaded successfully'), 'success');
            // return back()->with('file_url', $fileUrl);
            return back();

        }

    }



    public function upload_txt (Request $request,$section_id ,$content_id){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:100',
            'txt'   => 'required|min:10|max:5000',
        ]);


        if ($validator->fails()) {
            toast(__('Data entry error'), 'error');
            return back()->withErrors($validator)->withInput();
        } else {


            $shearing_guests = $request->special_for == 'private' ? 'private' : 'general';
            $status = $request->publication_status == 'private' ? 'private' : 'general';

            $validatedData = $validator->validated();


            Txt::create([
                'content_id' => $content_id,
                'title' => $validatedData['title'],
                'content' => $validatedData['txt'],
                'status' => $status,
                'shearing_guests' => $shearing_guests,
                'updated_at' => now(),
                'created_at' => now(),
            ]);
            toast(__('The video has been uploaded successfully'), 'success');
            return back();

        }
    }











}
