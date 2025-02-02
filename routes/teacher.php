<?php

use App\Http\Controllers\Content\Server\PostContentController;
use App\Http\Controllers\Teacher\Content\ContentManagementController;
use App\Http\Controllers\Teacher\Course\CourseInfoController;
use App\Http\Controllers\Teacher\Course\CourseManagementController;
use App\Http\Controllers\Teacher\Course\ManagementController;
use App\Http\Controllers\Teacher\CourseManagementController as TeacherCourseManagementController;
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





Route::group(['middleware' => ['role_or_permission:teacher'], 'prefix' => 'teacher'], function () {

    Route::get('courses/home', [ManagementController::class , 'index'])->name('teacher.courses.home');

        Route::group(['prefix'=>'course'], function(){



            Route::post('/create',[ManagementController::class , 'CreateCourse'])->name('teacher.course.create');

            Route::get('/{url}/settings', [ManagementController::class , 'CourseSettings'])->name('teacher.course.settings');
            Route::post('/{url}/settings', [ManagementController::class , 'CourseSettingsUpdate'])->name('teacher.course.settings.update');


            Route::get('/{url}/content/settings', [ManagementController::class , 'CourseDisplayInformation'])->name('teacher.course.display');

            Route::post('/{id}/content/settings', [ManagementController::class , 'CourseDisplayInformationUpdate'])->name('teacher.course.display.update');



            // Contents
            Route::group(['prefix'=>'contents'], function(){

                Route::get('/{url}/content',[ContentManagementController::class , 'index'])->name('teacher.course.contents.home');

                if (config('app.storage_type_data') == 'S3') {


                    // Route::post('/{url}/content/create',[ContentManagementController::class , 'CreateContent'])->name('teacher.course.contents.create');


                } else {

                    Route::post('/{url}/content/create',[PostContentController::class , 'CreateContent'])->name('teacher.course.contents.create');

                    //  Route::post('/{url}/content/create',[CreateContent::class , 'CreateCourseContent'])->name('teacher.course.contents.create');

                }



            });


            Route::get('/{url}/home',[CourseInfoController::class , 'CourseInfoPage'])->name('teacher.course.info');

    });







    // Route::get('course/{id}/section/view',[CourseManagementController::class , 'ViewSection'])->name('teacher.course.section.view');
    // Route::post('course/{id}/section/create/file',[CourseManagementController::class , 'CreateFileSection'])->name('teacher.course.section.create.file');


});



