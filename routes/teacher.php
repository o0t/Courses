<?php

use App\Http\Controllers\Teacher\CourseManagementController;
use App\Http\Controllers\Teacher\UploadContentController;
use App\Http\Controllers\Teacher\ManagerContentController;
use AWS\CRT\HTTP\Request;
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


// Route::get('test',function(){
//     return view('teacher.home');
// });


Route::group(['middleware' => ['role_or_permission:teacher'], 'prefix' => 'teacher'], function () {

    Route::get('courses/home', [CourseManagementController::class , 'index'])->name('teacher.courses.home');

        Route::group(['prefix'=>'course'], function(){

            Route::post('/create',[CourseManagementController::class , 'CreateCourse'])->name('teacher.course.create');
            Route::get('/{url}/home',[CourseManagementController::class , 'CourseInfoPage'])->name('teacher.course.info');
            Route::get('/{url}/settings', [CourseManagementController::class , 'CourseSettings'])->name('teacher.course.settings');
            Route::post('/{url}/settings', [CourseManagementController::class , 'CourseSettingsUpdate'])->name('teacher.course.settings.update');
            Route::get('/{url}/content/settings', [CourseManagementController::class , 'ContentDisplaySettings'])->name('teacher.course.content.display.settings');
            Route::post('/{id}/content/settings', [CourseManagementController::class , 'ContentDisplaySettingsUpdate'])->name('teacher.course.content.display.settings.update');



            Route::group(['prefix'=>'contents'], function(){

                Route::get('/{url}/content',[ManagerContentController::class , 'Contents'])->name('teacher.course.contents');

                Route::post('/{url}/content/create',[ManagerContentController::class , 'CreateContent'])->name('teacher.course.contents.create');

            });




    });




    // Course Settings

    // Content display settings

    // Pricing


    // View Course Content
    // Create Content


    // single section
    // Route::get('course/{id}/section/view',[CourseManagementController::class , 'ViewSection'])->name('teacher.course.section.view');
    Route::post('course/{id}/section/create/file',[CourseManagementController::class , 'CreateFileSection'])->name('teacher.course.section.create.file');


});



