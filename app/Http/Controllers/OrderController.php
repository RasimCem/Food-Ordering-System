<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\User;

class OrderController extends Controller
{
    public function createOrder($userId){

        $customer = User::where('user_id',$userId);
        if($customer){
            $carts = Cart::where('user_id',$userId)->get();
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
              //  Cart::where('user_id',$userId)->delete();
                return response()->json('Order Created!',200);
            }
            return response()->json('Your Cart Is Empty',404);
        }
        return response()->json('Customer Not Found',404);
    }

    public function showClientsOrderHistory($userId){
       $orders = Order::where('user_id',$userId)->get();
       return response()->json($orders,201);

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
        return response()->json(Order::all(),201);
    }

    public function updateOrderStatus($orderId, $status){
        Order::where('id',$orderId)->update(['status'=>$status]);
        return response()->json("Status Updated",'201');
    }
}
