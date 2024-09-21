<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Content;
use App\Models\Likes;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentInteractions extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function LikeContent($token){

        $content = Content::where('token',$token)->first();

        if (!$content || !$token) {
            return back();
        }


        $like = Likes::where('user_id', Auth::user()->id)
              ->where('content_id', $content->id)
              ->first();

        if ($like) {
            $like->delete();

            toast(__('The like has been removed successfully'), 'success');

        }else{
            Likes::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
            ]);

            toast(__('You have been successfully liked'), 'success');
        }

        return back();

    }



    public function ArchiveContent($token){

        $content = Content::where('token',$token)->first();

        if (!$content || !$token) {
            return back();
        }

        $Archive = Archive::where('user_id', Auth::user()->id)
        ->where('content_id', $content->id)
        ->first();


        if ($Archive) {
            $Archive->delete();

            toast(__('The content archive has been successfully deleted'), 'success');

        }else{
            Archive::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
            ]);

            toast(__('Content has been archived successfully'), 'success');
        }

        return back();

    }


    public function NoteContent(Request $request, $token){

        $content = Content::where('token',$token)->first();

        if (!$content || !$content) {
            return back();
        }

        $Note = Note::where('user_id', Auth::user()->id)
        ->where('content_id', $content->id)
        ->first();

        $validator = Validator::make($request->all(), [
            'note'        =>  'required|max:5000'
        ]);


        if ($validator->fails()) {
            toast(__('Data entry error'),'error');
            return back()->withErrors($validator)->withInput();
        }else{
            toast(__('Data updated successfully'),'success');
        }

        if ($Note) {

            $Note->update([
                'note'      => $request->note,
            ]);

            toast(__('Notes saved'), 'success');

        }else{

            Note::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
                'note'          => $request->note,
                'token'         => $request->_token
            ]);

            toast(__('Notes saved'), 'success');

        }


        return back();

    }

}
