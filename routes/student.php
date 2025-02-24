<?php

use App\Http\Controllers\Courses\ViewContentController;
use App\Http\Controllers\Courses\ViewCoursesController;
use App\Http\Controllers\Student\ArticleController;
use App\Http\Controllers\Student\CommentsController;
use App\Http\Controllers\Student\ProjectController;
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
Route::group(['prefix'=>'course'], function(){

    Route::get('{title}/content' , [ViewContentController::class , 'index'])->name('course.content');
    Route::get('{title}/content/{token}', [ViewContentController::class , 'Get_Content_From_Token'])->name('course.content.get');

    Route::get('{title}/content/{token}/next', [ViewContentController::class , 'NextPage'])->name('course.content.next');
    Route::get('{title}/content/{token}/previous', [ViewContentController::class , 'PreviousPage'])->name('course.content.previous');

});


Route::group(['prefix'=>'content'], function(){

    // Comment
    Route::post('{token}/comment/create', [CommentsController::class,'CreateComment'])->name('course.comment.create');
    // Route::post('content/{token}/comment/{token}/reply', [CommentsController::class,'ReplyComment'])->name('course.comment.reply');
    // Like Comment
    Route::get('{content_token}/comment/{id}/like', [StudentInteractions::class,'LikeComment'])->name('course.comment.like');
    // Like
    Route::get('{token}/like', [StudentInteractions::class,'LikeContent'])->name('course.content.like');
    // Archive Content
    Route::get('{token}/archive', [StudentInteractions::class,'ArchiveContent'])->name('course.content.archive');
    // Note Content
    Route::post('{token}/note', [StudentInteractions::class,'NoteContent'])->name('course.content.note');

});



Route::group(['prefix'=>'project'], function(){

    Route::get('create' , [ProjectController::class , 'CreateProjectPage'])->name('project.create.get');
    Route::post('create' , [ProjectController::class , 'CreateProject'])->name('project.create.post');

});

Route::group(['prefix'=>'article'], function(){

    Route::get('create' , [ArticleController::class,'CreateArticlePage'])->name('article.create.get');
    Route::post('create' , [ArticleController::class,'CreateArticle'])->name('article.create.post');

});






Route::get('file_name/{name}' , [ViewContentController::class , 'GetContentJquery'])->name('file.get');


