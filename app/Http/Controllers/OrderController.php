<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\RestaurantOwner;
use Illuminate\Support\Carbon;
class OrderController extends Controller
{
    public function createOrder(){
        $customer = Customer::where('user_id',Auth::user()->id)->first();
        if($customer->city && $customer->district && $customer->street && $customer->address_description){
            $userId = Auth::user()->id;
            $carts = Cart::where('user_id', $userId)->get();
            if($carts->isNotEmpty()){
                $content="";
                $price = 0;
                foreach($carts as $cart){
                    $content .= $cart->menus->name.",  ";
                    $price+=$cart->menus->price;
                }
                Order::create([
                    "user_id"=>$userId,
                    "restaurant_id"=>$carts[0]->menus['restaurant_id'],
                    "status"=>"waiting",
                    "content"=>$content,
                    "total_price"=>$price
                ]);
                // Clean the Cart
                Cart::where('user_id',$userId)->delete();
                return response()->json('Order Created!',200);
            }
            return response()->json('Your Cart Is Empty',404);
        }
        return response()->json('Address Details Not Found',404);
    }

    public function showCustomersOrderHistory(){
       $orders = Order::where('user_id',Auth::user()->id)->get();
       foreach($orders as $order){
           $order->restaurant;
       }
       return response()->json($orders,200);

    }

    public function showRestaurantsOrderHistory($restaurantId){
        $orders = Order::where('restaurant_id',$restaurantId)->where('status','!=','waiting')->get();
        return response()->json($orders,201);
    }

    public function showRestaurantsActiveOrders($restaurantId){
        $orders = Order::where('restaurant_id',$restaurantId)->where('status','waiting')->get();
        return response()->json($orders,201);
    }

    public function getAllOrders(){
        $orders =Order::all();
        foreach($orders as $order){
            $order->restaurant;
            $order->user;
        }
        return response()->json($orders,201);
    }

    public function updateOrderStatus($orderId, $status){
        Order::where('id',$orderId)->update(['status'=>$status]);
        return response()->json("Status Updated",'201');
    }

    public function showMyRestaurantsActiveOrders(){
        $owner = User::where('id',Auth::user()->id)->first();
        $id = $owner->restaurantOwner->myRestaurant->id;
        $myOrders = Order::where('restaurant_id',$id)->where('status','waiting')->get();
        foreach($myOrders as $myOrder){
            $myOrder->user->customer;
        }
         return response()->json($myOrders,200);

    }

    public function showMyRestaurantOrderHistory(){
        $restaurantId = RestaurantOwner::where('user_id',(Auth::user()->id))->first()->restaurant_id;
        $orders = Order::where('restaurant_id',$restaurantId)->get();
        foreach($orders as $order){
            $order->user->customer;
        }
        return response()->json($orders,200);
    }

    public function showMyRestaurantOrderHistoryInMonthly(){
        $restaurantId = RestaurantOwner::where('user_id',(Auth::user()->id))->first()->restaurant_id;
        $orders = Order::whereYear('created_at',2021)->where('restaurant_id',$restaurantId)->orderBy('created_at')->get()->groupBy(function($date){
           return Carbon::parse($date->created_at)->format('m');
        });
        return response()->json($orders,200);
    }

    public function showOrder($orderId){
        $order = Order::find($orderId)->first();
        $order->restaurant;
        $order->user;
        return response()->json($order,200);
    }
}
