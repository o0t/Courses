<?php

namespace App\Http\Controllers\Content\Server;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostContentController extends Controller
{


    public function CreateContent(Request $request){

        $Course = Courses::where('url', $request->url)->first();

        if ($request->content_type == 'writing') {

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|min:2|max:200',
                'txt-content' => 'required|min:10',
            ]);

            if ($validator->fails()) {
                toast(__('Data entry error'),'error');
                return back()->withErrors($validator)->withInput();
            }

            $content = $Course->content()->create([
                'courses_id'        => $Course->id,
                'type'              => 'txt',
                'title'             => $request->title,
                'url'               => $Course->url . '/' . $request->title,
                'allow_comments'    => $request->allow_comments === "on" ? "yes" : "no",
                'token'             => $request->_token
            ]);


            toast(__('Text uploaded successfully'),'success');
            return back();


        }elseif ($request->content_type == 'upload'){



            $validator = Validator::make($request->all(), [
                'title'       => 'required|string|min:2|max:200',
                'description' => 'required|min:10',
            ]);



            // Check if a file is uploaded
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();


                if (($extension === 'mp4' || $extension === 'avi' || $extension === 'mov' || $extension === 'mkv') ) {
                    // Validate for video formats
                    $request->validate([
                        'file' => 'required|file|mimes:mp4,avi,mov,mkv|max:10240', // Max 10GB
                    ]);

                    // Store the video
                    $path = $file->store('', 'videos');


                    if ($validator->fails()) {
                        toast(__('Data entry error'),'error');
                        return back()->withErrors($validator)->withInput();
                    }

                    $content = $Course->content()->create([
                        'courses_id'        => $Course->id,
                        'type'              => 'video',
                        'title'             => $request->title,
                        'file_name'          => $path,
                        'extension'         => $extension,
                        'description'       => $request->description,
                        'url'               => $Course->url . '/' . $request->title,
                        'allow_comments'    => $request->allow_comments === "on" ? "yes" : "no",
                        'token'             => $request->_token
                    ]);


                } elseif (in_array($extension, ['pdf', 'txt', 'docx','doc'])) {
                    // Validate for text files
                    $request->validate([
                        'file' => 'required|file|mimes:txt,pdf,docx,doc|max:20480', // Max 20MB
                    ]);

                    // Store the text file
                    $path = $file->store('', 'texts');


                    $content = $Course->content()->create([
                        'courses_id'        => $Course->id,
                        'type'              => 'file',
                        'title'             => $request->title,
                        'file_name'          => $path,
                        'extension'         => $extension,
                        'description'       => $request->description,
                        'url'               => $Course->url . '/' . $request->title,
                        'allow_comments'    => $request->allow_comments === "on" ? "yes" : "no",
                        'token'             => $request->_token
                    ]);


                }

                toast(__('Content uploaded successfully'),'success');
                return back();
            }


        }elseif ($request->content_type == 'section'){


            $validator = Validator::make($request->all(), [
                'title_section' => 'required|string|min:2|max:100',
            ]);

            if ($validator->fails()) {
                toast(__('Data entry error'),'error');
                return back()->withErrors($validator)->withInput();
            }


            $content = $Course->content()->create([
                'courses_id'    => $Course->id,
                'is_section'    => 'yes',
                'title'         => $request->title_section ?? null,
                'url'           => $request->title_section ?? null,
                'token'         => $request->_token
            ]);


            toast(__('The section was created successfully'),'success');
            return back();
        }


    }



}
