<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(UserController::class)->middleware('guest')->group(function () {
    
    Route::match(['get','post'],'login','login')->name('user.login');
    Route::get('registration','registration')->name('user.registration');
    Route::get('logout','logout')->name('user.logout');
});

Route::view("/", 'welcome');

