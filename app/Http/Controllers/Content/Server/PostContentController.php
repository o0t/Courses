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
                'courses_id'    => $Course->id,
                // 'is_section'    => 'no',
                'type'          => 'txt',
                'title'         => $request->title,
                'url'           => $Course->url . '/' . $request->title,
                'allow_comments'=> $request->allow_comments === "on" ? "yes" : "no",
                'token'         => $request->_token
            ]);


        }elseif ($request->content_type == 'upload'){

            return 'upload';
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


        }


        toast(__('The section was created successfully'),'success');
        return back();

    }



}
