<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Comments;
use App\Models\Content;
use App\Models\Likes;
use App\Models\Likes_comments;
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



    public function LikeContent($token) {
        $content = Content::where('token', $token)->first();

        // Check if content exists
        if (!$content) {
            return response()->json(['message' => 'Content not found.'], 404);
        }

        $like = Likes::where('user_id', Auth::user()->id)
              ->where('content_id', $content->id)
              ->first();

        if ($like) {
            $like->delete();
            // toast(__('The like has been removed successfully'), 'success');

            return response()->json([
                'message' => 'Like removed successfully.',
                'status'  => 'delete like',
            ]);
        } else {
            Likes::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
            ]);

            // toast(__('You have been successfully liked'), 'success');

            return response()->json([
                'message' => 'Liked successfully.',
                'status'  => 'create like',
            ]);
        }
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

            // toast(__('The content archive has been successfully deleted'), 'success');

            return response()->json([
                'message' => 'Archive removed successfully.',
                'status'  => 'delete Archive',
            ]);

        }else{
            Archive::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
            ]);

            // toast(__('Content has been archived successfully'), 'success');
            return response()->json([
                'message' => 'Archive successfully.',
                'status'  => 'create Archive',
            ]);
        }


    }



    public function NoteContent(Request $request, $token)
    {
        // Find the content by token
        $content = Content::where('token', $token)->first();

        // Check if content exists
        if (!$content) {
            return response()->json(['message' => 'Content not found'], 404);
        }

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'note' => 'required|max:5000',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return response()->json([
                'message' => __('Data entry error'),
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find the existing note for the user
        $note = Note::where('user_id', Auth::user()->id)
            ->where('content_id', $content->id)
            ->first();

        // If a note exists, update it; otherwise, create a new note
        if ($note) {
            $note->update(['note' => $request->note]);
        } else {
            $note = Note::create([
                'user_id' => Auth::user()->id,
                'content_id' => $content->id,
                'note' => $request->note,
                'token' => $request->_token,
            ]);
        }

        // Return success response only if the note was saved/updated
        return response()->json([
            'message' => __('Notes saved'),
            'note' => $note,
        ]);
    }

    // public function ReplyComment(Request $request , $content_token , $comment_token){
    //     // return 'ReplyComment';
    // }


    public function LikeComment($content_token,$id){

        $content = Content::where('token',$content_token)->first();
        $comment = Comments::find($id);

        if (!$content || !$comment || !$content_token || !$id) {
            return back();
        }


        $like = Likes_comments::where('user_id', Auth::user()->id)
              ->where('content_id', $content->id)
              ->where('comment_id', $comment->id)
              ->first();

        if ($like) {

            $like->delete();
            toast(__('The like has been removed successfully'), 'success');

        }else{

            Likes_comments::create([
                'user_id'       => Auth::user()->id,
                'content_id'    => $content->id,
                'comment_id'    => $comment->id,
            ]);

            toast(__('You have been successfully liked'), 'success');
        }

        return back();

    }
}
