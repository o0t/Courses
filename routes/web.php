<?php

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

Route::get('/', function () {
    return view('index');
});





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


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
