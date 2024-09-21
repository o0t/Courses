<?php

use App\Http\Controllers\Courses\ViewContentController;
use App\Http\Controllers\Courses\ViewCoursesController;
use App\Http\Controllers\Student\CommentsController;
use App\Http\Controllers\Student\StudentInteractions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('course/{title}/content' , [ViewContentController::class , 'index'])->name('course.content');

Route::get('course/{title}/content/{token}', [ViewContentController::class , 'Get_Content_From_Token'])->name('course.content.get');

Route::get('course/{title}/content/{token}/next', [ViewContentController::class , 'NextPage'])->name('course.content.next');
Route::get('course/{title}/content/{token}/previous', [ViewContentController::class , 'PreviousPage'])->name('course.content.previous');


// Comment
Route::post('content/{token}/comment/create', [CommentsController::class,'CreateComment'])->name('course.comment.create');

// Like
Route::get('content/{token}/like', [StudentInteractions::class,'LikeContent'])->name('course.comment.like');



// introductory_video
Route::get('introductory_video/{name}' , [ViewCoursesController::class , 'Get_Introductory_Video'])->name('get.introductory_video');


Route::get('file_name/{name}' , [ViewContentController::class , 'GetContentJquery'])->name('file.get');


