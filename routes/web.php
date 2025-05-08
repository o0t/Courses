<?php

use App\Http\Controllers\Courses\Server\ViewCoursesController as ServerViewCoursesController;
use App\Http\Controllers\Courses\SubscribeController;
use App\Http\Controllers\Courses\ViewCoursesController;
use App\Http\Controllers\General\PagesController;
use App\Http\Controllers\General\SearchController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\TestController;
use App\Models\Subscribers;
use Illuminate\Routing\ViewController;
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

Route::get('/', [PagesController::class , 'index'])->name('index');


Route::group(['prefix'=>'category'], function(){

    Route::get('{category}', [PagesController::class , 'category'])->name('category');
    Route::get('{category}/courses/latest', [PagesController::class , 'LatestCategoryCourses'])->name('category.courses.latest');
    Route::get('{category}/courses/oldest', [PagesController::class , 'OldestCategoryCourses'])->name('category.courses.oldest');

});


Route::group(['prefix'=>'course'], function(){

        Route::get('{title}' , [ViewCoursesController::class , 'index'])->name('course.view');
        Route::get('{title}/subscribe' , [SubscribeController::class , 'subscribe'])->name('course.subscribe');
        Route::post('search' , [PagesController::class , 'FormSearchCourses'])->name('course.search');



        Route::get('introductory_video/{name}' , [ViewCoursesController::class , 'Get_Introductory_Video'])->name('get.introductory_video');


    // if (config('app.storage_type_data') == 'S3') {
    //     // introductory_video


    // }else{

    //     // Route::get('{name}/subscribe' , [SubscribeController::class , 'subscribe'])->name('course.subscribe');
    //     // Route::post('search' , [PagesController::class , 'FormSearchCourses'])->name('course.search');
    // }


});


Route::group(['prefix'=>'projects'], function(){

    Route::get('/' , [PagesController::class , 'Projects'])->name('projects.home');


    if (config('app.storage_type_data') == 'S3') {
        Route::get('images/{name}' , [PagesController::class , 'ProjectImages'])->name('projects.images');
    }else{
        Route::get('images/{name}' , [PagesController::class , 'ProjectImagesServer'])->name('projects.images');
    }
    Route::get('{token}/details' , [PagesController::class , 'ProjectDetails'])->name('projects.details');

});

Route::group(['prefix'=>'articles'], function(){

    Route::get('/' , [PagesController::class , 'Articles'])->name('articles.home');
    Route::get('images/{name}' , [PagesController::class , 'ArticleImages'])->name('articles.images');
    Route::get('{token}details' , [PagesController::class , 'ArticleDetails'])->name('articles.details');

});




Route::get('test', function(){
    // Auth::user()->syncRoles('member');
    Auth::user()->syncRoles('student');
    // Auth::user()->syncRoles('teacher');
    // Auth::user()->syncRoles('teacher-admin');
    // Auth::user()->syncRoles('admin');

    return redirect()->route('test.role');

});

Route::get('role', function(){

    $user = Auth::user();
    $roles = $user->getRoleNames(); // Returns a collection

    return $roles;

})->name('test.role');

Route::get('p', function(){

    $user = Auth::user();

    // $user->revokePermissionTo('create-course');
    // $user->syncPermissions('create-course');
    $p = $user->getAllPermissions();

    return $p;

});


/*
|--------------------------------------------------------------------------
|
|--------------------------------------------------------------------------
*/


Route::get('lan/{locale}', function ($locale) {
    if ($locale == 'ar') {

        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }elseif($locale == 'en'){

        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();

    }else{
        return redirect()->back();
    }
})->name('lan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
