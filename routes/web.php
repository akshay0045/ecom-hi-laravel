<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view("/", 'welcome');
Route::view("/login", 'auth.login');
Route::view("/registration", 'auth.registration');
