<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Restaurant (Authentication not necessary)
Route::get('restaurant', [App\Http\Controllers\RestaurantController::class,'index']);
Route::get('restaurant/{restaurant}', [App\Http\Controllers\RestaurantController::class,'searchForRestaurant']);
// Auth
Route::post('register',[ App\Http\Controllers\UserController::class,'register']);
Route::post('login',[ App\Http\Controllers\UserController::class,'login']);

Route::middleware('auth:api')->group(function () {
	Route::post('logout',[ App\Http\Controllers\UserController::class,'logout']);
    Route::get('users',[ App\Http\Controllers\UserController::class,'getAllUsers']);
    Route::get('my-information',[ App\Http\Controllers\UserController::class,'showMyInformation']);
    Route::post('my-information/update',[ App\Http\Controllers\UserController::class,'updateUserInformation']);
    Route::post('my-contact-information/update',[ App\Http\Controllers\UserController::class,'updateContactInformation']);

    //Restaurant Admin Operations
    Route::post('restaurant',[ App\Http\Controllers\RestaurantController::class,'store']);
    Route::get('restaurant/delete/{id}',[ App\Http\Controllers\RestaurantController::class,'destroy']);
    Route::post('restaurant/update/{id}',[ App\Http\Controllers\RestaurantController::class,'update']);
    // My Restaurant Operations
    Route::get('my-restaurant/details',[ App\Http\Controllers\RestaurantController::class,'getMyRestaurantDetails']);
    Route::post('my-restaurant/update',[ App\Http\Controllers\RestaurantController::class,'updateMyRestaurantDetails']);
    //Menu Operations Owner
    // Create menu for a restaurant
    Route::post('my-menu/create', [App\Http\Controllers\MenuController::class,'storeMyMenu']);
    Route::get('my-menu/show', [App\Http\Controllers\MenuController::class,'showMyMenu']);
    Route::get('my-menu/delete/{menu_id}', [App\Http\Controllers\MenuController::class,'deleteMyMenu']);
    Route::get('my-menu/get/{menu_id}', [App\Http\Controllers\MenuController::class,'getMyMenuById']);
    Route::put('my-menu/update/{menuId}', [App\Http\Controllers\MenuController::class,'updateMyMenu']);
    // Get all the menus of the restaurant
    Route::get('menu/{restaurantId}', [App\Http\Controllers\MenuController::class,'show']);

   // Route::delete('menu/{menuId}', [App\Http\Controllers\MenuController::class,'destroy']);

    // Add Item To Cart
    Route::get('cart/{menuId}', [App\Http\Controllers\CartController::class,'addItemToCart']);
    Route::get('cart-delete/{cartId}', [App\Http\Controllers\CartController::class,'removeItemFromCart']);
    Route::get('cart', [App\Http\Controllers\CartController::class,'showMyCart']);

    // Create An Order
    Route::get('order/create/{userId}', [App\Http\Controllers\OrderController::class,'createOrder']);
    Route::get('order/history-client/{userId}', [App\Http\Controllers\OrderController::class,'showClientsOrderHistory']);
    Route::get('order/history-owner/{restaurantId}', [App\Http\Controllers\OrderController::class,'showRestaurantsOrderHistory']);
    Route::get('order/show-active-orders', [App\Http\Controllers\OrderController::class,'showMyRestaurantsActiveOrders']);// owner
    Route::get('order/active-owner/{restaurantId}', [App\Http\Controllers\OrderController::class,'showRestaurantsActiveOrders']);// admin
    Route::get('order/status-update/{orderId}/{status}', [App\Http\Controllers\OrderController::class,'updateOrderStatus']);
    Route::get('orders', [App\Http\Controllers\OrderController::class,'getAllOrders']);
    Route::get('orders/my-restaurant', [App\Http\Controllers\OrderController::class,'showMyRestaurantOrderHistory']);
    Route::get('orders/my-restaurant/monthly', [App\Http\Controllers\OrderController::class,'showMyRestaurantOrderHistoryInMonthly']);


    // Comments
    Route::put('comment/{orderId}',[ App\Http\Controllers\CommentController::class,'create']);
    Route::get('comment/my-restaurant',[ App\Http\Controllers\CommentController::class,'show']);
});
