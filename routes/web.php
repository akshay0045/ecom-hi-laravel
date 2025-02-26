<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(UserController::class)->middleware('guest')->group(function () {
    
    Route::match(['get','post'],'login','login')->name('login');
    Route::get('registration','registration')->name('registration');
});
Route::controller(UserController::class)->middleware('auth')->group(function () {
    
    Route::get("cart",'cart')->name('user.cart');
    Route::post("qtyupdate",'qtyupdate')->name('user.qtyupdate');
    Route::post("cartitemdelete",'cartitemdelete')->name('user.cartitemdelete');
    Route::get('logout','logout')->name('user.logout');
    Route::get('checkout','checkout')->name('user.checkout');
    Route::post('placeorder','placeorder')->name('user.placeorder');
    Route::get('successpage/{id}','successpage')->name('order.successpage');
    Route::get('customer/{type}','customer')->name('user.customer');
    Route::get('customer/order/view/{id}','orderview')->name('customer.order.view');
});

// Route::view("/", 'welcome');
Route::controller(ProductController::class)->group(function () {
    Route::get('/','index')->name('product.index');
    Route::get("detail/{id}",'detail')->name('product.detail');
    Route::get("search",'search')->name('product.search');
    Route::post("addtocart",'addtocart')->name('product.addtocart');
});




