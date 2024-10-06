<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Courses;
use App\Models\Main_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function CreateArticlePage(){

        $categories = Main_categories::all();
        $courses = Courses::all('title');
        return view('articles.create-article', compact('categories','courses'));
    }




    public function CreateArticle(Request $request){

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:100|min:3',
            'title'         => 'required|string|max:100|min:3',
            'article'       => 'max:500000',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'courses'       => 'required|exists:courses,title',
        ]);

        if ($validator->fails()) {
            toast(__('Data entry error'), 'error');
            return back()->withErrors($validator)->withInput();
        }

        $course = Courses::where('title', $request->courses)->first();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename =  Str::uuid() . '-' . time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('minio')->putFileAs('article_images/', $file, $filename);

        }

        Articles::create([
            'user_id'     => Auth::user()->id,
            'courses_id'  => $course->id,
            'name'        => $request->name,
            'title'       => $request->title,
            'image'       => $filename,
            'article'     => $request->article,
            'token'       => $request->_token,
            'url'         => 'https://example.com/article/'.Str::uuid().'-'. time().$request->name,
        ]);

        toast(__('The article was created successfully'), 'success');
        return back();

    }


}
