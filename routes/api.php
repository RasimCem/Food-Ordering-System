<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Restaurant (Authentication not necessary)
Route::resource('restaurant', App\Http\Controllers\RestaurantController::class);
Route::get('restaurant/{restaurant}', [App\Http\Controllers\RestaurantController::class,'searchForRestaurant']);
// Auth
Route::post('register',[ App\Http\Controllers\UserController::class,'register']);
Route::post('login',[ App\Http\Controllers\UserController::class,'login']);

Route::middleware('auth:api')->group(function () {
	Route::post('logout',[ App\Http\Controllers\UserController::class,'logout']);
});
