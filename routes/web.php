<?php

use App\Http\Controllers\Courses\SubscribeController;
use App\Http\Controllers\Courses\ViewCoursesController;
use App\Http\Controllers\General\PagesController;
use App\Http\Controllers\Student\ProjectController;
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


Route::get('category/{category}', [PagesController::class , 'category'])->name('category');


Route::get('category/{category}/courses/latest', [PagesController::class , 'LatestCategoryCourses'])->name('category.courses.latest');
Route::get('category/{category}/courses/oldest', [PagesController::class , 'OldestCategoryCourses'])->name('category.courses.oldest');
// Route::get('category/{category}/courses/oldest', [PagesController::class , 'OldestCategoryCourses'])->name('category.courses.oldest');


Route::get('course/{name}' , [ViewCoursesController::class , 'index'])->name('course.view');

Route::get('course/{name}/subscribe' , [SubscribeController::class , 'subscribe'])->name('course.subscribe');




Route::get('projects' , [PagesController::class , 'Projects'])->name('projects.home');

Route::get('projects/images/{name}' , [PagesController::class , 'ProjectImages'])->name('projects.images');

Route::get('projects/{token}/details' , [PagesController::class , 'ProjectDetails'])->name('projects.details');


Route::get('articles' , [PagesController::class , 'Articles'])->name('articles.home');

Route::get('articles/{token}details' , [PagesController::class , 'ArticleDetails'])->name('articles.details');

Route::get('articles/images/{name}' , [PagesController::class , 'ArticleImages'])->name('articles.images');



Route::get('test', function(){
    // Auth::user()->syncRoles('member');
    // Auth::user()->syncRoles('student');
    Auth::user()->syncRoles('teacher');
    // Auth::user()->syncRoles('teacher-admin');
    // Auth::user()->syncRoles('admin');

    return back();

});

Route::get('role', function(){

    $user = Auth::user();
    $roles = $user->getRoleNames(); // Returns a collection

    return $roles;

});

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
