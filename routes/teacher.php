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




Route::group(['middleware' => ['permission:create-course|view-course'], 'prefix' => 'teacher'], function () {
    Route::get('content/home', [TeacherContentController::class , 'index'])->name('teacher.content.home');
});



 Route::group(['middleware' => ['permission:create-course|view-course|edit-course|delete-course'], 'prefix' => 'teacher'], function () {
    Route::post('course/create',[TeacherContentController::class , 'CreateCourse'])->name('teacher.course.create');
    Route::get('course/{url}/details',[TeacherContentController::class , 'CourseDetails'])->name('teacher.course.details');
    Route::post('course/{url}/sections',[TeacherContentController::class , 'CreateSection'])->name('teacher.course.create.section');
 });


//  Route::post('course/{url}/sections', [TeacherContentController::class, 'CreateSection'])->name('teacher.course.create.section');

//  Route::post('course/{course}/section', 'Teacher\CourseController@createSection')->name('course.create.section');
