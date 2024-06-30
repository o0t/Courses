<?php

use App\Http\Controllers\Teacher\CourseManagementController;
use App\Http\Controllers\Teacher\UploadContentController;
use App\Http\Controllers\Teacher\ManagerContentController;
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
    Route::get('content/home', [CourseManagementController::class , 'index'])->name('teacher.content.home');
});



Route::group(['middleware' => ['permission:create-course|view-course|edit-course|delete-course'], 'prefix' => 'teacher'], function () {
    Route::post('course/create',[CourseManagementController::class , 'CreateCourse'])->name('teacher.course.create');
    Route::get('course/{url}/home',[CourseManagementController::class , 'CourseHome'])->name('teacher.course.home');

});


Route::group(['middleware' => ['permission:view-section|create-section|edit-section|delete-section'], 'prefix' => 'teacher'], function () {
    // View
    Route::get('course/{url}/sections',[CourseManagementController::class , 'Sections'])->name('teacher.course.sections');
    // Create
    Route::post('course/{url}/sections/create',[CourseManagementController::class , 'CreateSections'])->name('teacher.course.sections.create');


    // single section
    Route::get('course/{id}/section/view',[CourseManagementController::class , 'ViewSection'])->name('teacher.course.section.view');
    Route::post('course/{id}/section/create/file',[CourseManagementController::class , 'CreateFileSection'])->name('teacher.course.section.create.file');



    // Uplode Video , pdf , txt
    Route::post('section/{section_id}/content/{content_id}/upload/video',[UploadContentController::class , 'upload_video'])->name('teacher.course.section.Upload.video');
    Route::post('section/{section_id}/content/{content_id}/upload/txt',[UploadContentController::class , 'upload_txt'])->name('teacher.course.section.Upload.txt');
    Route::post('section/{section_id}/content/{content_id}/upload/pdf',[UploadContentController::class , 'upload_pdf'])->name('teacher.course.section.Upload.pdf');

    // Create test


    // Delete
    Route::get('video/{id}/delete',[ManagerContentController::class , 'DeleteVideo'])->name('teacher.course.video.delete');
    Route::get('txt/{id}/delete',[ManagerContentController::class , 'DeleteTxt'])->name('teacher.course.txt.delete');
    Route::get('pdf/{id}/delete',[ManagerContentController::class , 'DeletePdf'])->name('teacher.course.pdf.delete');


});

