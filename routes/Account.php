<?php

use App\Http\Controllers\Account\Settings;
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



Route::group(['middleware' => ['auth'], 'prefix' => 'account'], function () {

    Route::get('/settings',[Settings::class , 'MyAccount'])->name('account.settings');



});

