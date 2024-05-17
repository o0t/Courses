<?php

use App\Http\Controllers\TeacherContentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('content/home', [TeacherContentController::class , 'index'])->name('content.home');

// Route::group(['middleware' => ['permission:publish articles|edit articles']], function () { ... });
Route::group(['middleware' => ['role:teacher|teacher-admin']], function () {




    Route::post('course/create',[TeacherContentController::class , 'CreateCourse'])->name('course.create');
});

