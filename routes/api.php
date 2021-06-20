<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[ App\Http\Controllers\UserController::class,'register']);
Route::post('login',[ App\Http\Controllers\UserController::class,'login']);
Route::get('restaurant', [App\Http\Controllers\RestaurantController::class,'getRestaurantsInMyLocation']);// customer
Route::get('restaurant/{restaurant}', [App\Http\Controllers\RestaurantController::class,'searchForRestaurant']);// customer
Route::get('comment/average-point/{restaurantId}',[ App\Http\Controllers\CommentController::class,'getAveragePointByRestaurantId']);//customer
Route::middleware('auth:api')->group(function () {
	Route::post('logout',[ App\Http\Controllers\UserController::class,'logout'])->middleware('checkRole:customer,admin,restaurantOwner');
    Route::get('customers',[ App\Http\Controllers\CustomerController::class,'getAllCustomers'])->middleware('checkRole:admin');
    Route::get('customer/{id}',[ App\Http\Controllers\CustomerController::class,'getCustomerInformation'])->middleware('checkRole:admin');
    Route::put('customer/update/{id}',[ App\Http\Controllers\CustomerController::class,'updateCustomerInformation'])->middleware('checkRole:admin');
    Route::put('customer/update-contact/{id}',[ App\Http\Controllers\CustomerController::class,'updateCustomerContactInformation'])->middleware('checkRole:admin');
    Route::get('customer-delete/{id}',[ App\Http\Controllers\CustomerController::class,'deleteCustomer'])->middleware('checkRole:admin');
    Route::get('my-information',[ App\Http\Controllers\CustomerController::class,'showMyInformation'])->middleware('checkRole:customer');
    Route::post('my-information/update',[ App\Http\Controllers\CustomerController::class,'updateUserInformation'])->middleware('checkRole:customer');
    Route::post('my-contact-information/update',[ App\Http\Controllers\CustomerController::class,'updateContactInformation'])->middleware('checkRole:customer');
    Route::post('my-password/update',[ App\Http\Controllers\UserController::class,'updateMyPassword'])->middleware('checkRole:customer,admin,restaurantOwner');
    Route::get('my-information/owner',[ App\Http\Controllers\RestaurantOwnerController::class,'showMyInformation'])->middleware('checkRole:restaurantOwner');
    Route::post('my-information/owner/update',[ App\Http\Controllers\RestaurantOwnerController::class,'updateMyInformation'])->middleware('checkRole:restaurantOwner');
    Route::get('my-information/admin',[ App\Http\Controllers\AdminController::class,'showMyInformation'])->middleware('checkRole:admin');
    Route::post('my-information/admin/update',[ App\Http\Controllers\AdminController::class,'updateMyInformationForAdmin'])->middleware('checkRole:admin');
    Route::post('restaurant',[ App\Http\Controllers\RestaurantController::class,'createRestaurant'])->middleware('checkRole:admin');
    Route::get('restaurant/show/{id}',[ App\Http\Controllers\RestaurantController::class,'getRestaurantById'])->middleware('checkRole:,customer,admin,restaurantOwner');
    Route::get('restaurant/delete/{id}',[ App\Http\Controllers\RestaurantController::class,'deleteRestaurant'])->middleware('checkRole:admin');
    Route::post('restaurant/update/{id}',[ App\Http\Controllers\RestaurantController::class,'updateRestaurant'])->middleware('checkRole:admin');
    Route::get('restaurants',[ App\Http\Controllers\RestaurantController::class,'getAllRestaurants'])->middleware('checkRole:admin');//?
    Route::get('my-restaurant/details',[ App\Http\Controllers\RestaurantController::class,'getMyRestaurantDetails'])->middleware('checkRole:restaurantOwner');
    Route::post('my-restaurant/update',[ App\Http\Controllers\RestaurantController::class,'updateMyRestaurantDetails'])->middleware('checkRole:restaurantOwner');
    Route::post('my-menu/create', [App\Http\Controllers\MenuController::class,'createMyMenu'])->middleware('checkRole:restaurantOwner');
    Route::get('my-menu/show', [App\Http\Controllers\MenuController::class,'showMyMenus'])->middleware('checkRole:restaurantOwner');
    Route::get('my-menu/delete/{menu_id}', [App\Http\Controllers\MenuController::class,'deleteMyMenu'])->middleware('checkRole:restaurantOwner');
    Route::get('my-menu/get/{menu_id}', [App\Http\Controllers\MenuController::class,'getMyMenuById'])->middleware('checkRole:restaurantOwner');
    Route::put('my-menu/update/{menuId}', [App\Http\Controllers\MenuController::class,'updateMyMenu'])->middleware('checkRole:restaurantOwner');
    Route::get('menu/{restaurantId}', [App\Http\Controllers\MenuController::class,'getAllMenusOfTheRestaurant'])->middleware('checkRole:customer,admin');
    Route::get('menu/show/{menuId}', [App\Http\Controllers\MenuController::class,'showMenu'])->middleware('checkRole:admin');
    Route::put('menu/update/{menuId}', [App\Http\Controllers\MenuController::class,'updateMenu'])->middleware('checkRole:admin');
    Route::delete('menu/{menuId}', [App\Http\Controllers\MenuController::class,'deleteMenu'])->middleware('checkRole:admin,restaurantOwner');
    Route::get('cart/{menuId}', [App\Http\Controllers\CartController::class,'addItemToCart'])->middleware('checkRole:customer');
    Route::get('cart-delete/{cartId}', [App\Http\Controllers\CartController::class,'removeItemFromCart'])->middleware('checkRole:customer');
    Route::get('cart', [App\Http\Controllers\CartController::class,'showMyCart'])->middleware('checkRole:customer');
    Route::get('order/create', [App\Http\Controllers\OrderController::class,'createOrder'])->middleware('checkRole:customer');
    Route::get('order/history-client', [App\Http\Controllers\OrderController::class,'showCustomersOrderHistory'])->middleware('checkRole:customer');
    Route::get('order/history-owner/{restaurantId}', [App\Http\Controllers\OrderController::class,'showRestaurantsOrderHistory'])->middleware('checkRole:restaurantOwner');
    Route::get('order/show-active-orders', [App\Http\Controllers\OrderController::class,'showMyRestaurantsActiveOrders'])->middleware('checkRole:restaurantOwner');
    Route::get('order/active-owner/{restaurantId}', [App\Http\Controllers\OrderController::class,'showRestaurantsActiveOrders'])->middleware('checkRole:admin');
    Route::get('order/status-update/{orderId}/{status}', [App\Http\Controllers\OrderController::class,'updateOrderStatus'])->middleware('checkRole:restaurantOwner');
    Route::get('orders', [App\Http\Controllers\OrderController::class,'getAllOrders'])->middleware('checkRole:admin');
    Route::get('order/show/{orderId}', [App\Http\Controllers\OrderController::class,'showOrder'])->middleware('checkRole:admin');
    Route::get('orders/my-restaurant', [App\Http\Controllers\OrderController::class,'showMyRestaurantOrderHistory'])->middleware('checkRole:restaurantOwner');
    Route::get('orders/my-restaurant/monthly', [App\Http\Controllers\OrderController::class,'showMyRestaurantOrderHistoryInMonthly'])->middleware('checkRole:restaurantOwner');
    Route::put('comment/{orderId}',[ App\Http\Controllers\CommentController::class,'createMyComment'])->middleware('checkRole:customer');
    Route::get('comment/my-restaurant',[ App\Http\Controllers\CommentController::class,'showCommentsOfMyRestaurant'])->middleware('checkRole:restaurantOwner');
    Route::get('comments',[ App\Http\Controllers\CommentController::class,'getAllComments'])->middleware('checkRole:admin');
    Route::delete('comment/{commentId}',[ App\Http\Controllers\CommentController::class,'deleteComment'])->middleware('checkRole:admin');
    Route::get('comment/restaurant/{restaurantId}',[ App\Http\Controllers\CommentController::class,'getCommentsByRestaurantId'])->middleware('checkRole:customer');
    Route::post('my-slider/upload',[App\Http\Controllers\SliderController::class,'createMySliderImage'])->middleware('checkRole:restaurantOwner');
    Route::put('my-slider/update/{sliderId}',[App\Http\Controllers\SliderController::class,'updateMySliderImage'])->middleware('checkRole:restaurantOwner');
    Route::get('sliders/{restaurantId}',[App\Http\Controllers\SliderController::class,'getSlidersOfTheRestaurant'])->middleware('checkRole:customer,restaurantOwner,admin');
    Route::put('restaurant-owner/{restaurantId}',[App\Http\Controllers\RestaurantOwnerController::class,'createRestaurantOwnerForRestaurant'])->middleware('checkRole:admin');
});

