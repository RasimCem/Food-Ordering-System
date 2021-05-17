<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client');
})->name('client');

Route::get('/panel', function () {
    return view('panel');
});




