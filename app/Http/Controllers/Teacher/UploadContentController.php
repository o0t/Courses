<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UploadContentController extends Controller
{
    public function __construct()
    {

    }


    public function upload_video (Request $request){





        $request->validate([
            'video' => 'required|mimes:mp4,mov|max:202400',
        ]);

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $filename = Str::uuid() . '-'.Auth::user()->id .'.' . $file->getClientOriginalExtension();

        } else {
            return 'no file';
        }




        Storage::disk('minio')->put('raqeeb/video'.$filename);

        return $request ;
    }

}
