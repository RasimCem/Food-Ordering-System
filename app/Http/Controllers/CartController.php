<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function addItemToCart($userId, $menuId){
        Cart::create([
            "menu_id"=>$menuId,
            "user_id"=>$userId
        ]);
        return response()->json('Item Added to Cart',200);
    }

    public function removeItemFromCart($userId, $menuId){
        $removedItem = Cart::where('user_id',$userId)->where('menu_id',$menuId)->delete();
        if($removedItem){
            return response()->json('Item Removed From Cart',200);
        }
        return response()->json('This Item is not Exist',404);
    }

    public function showCart($userId){
        $cart = Cart::where('user_id',$userId)->with('menus')->get();
        if($cart){
            return response()->json($cart,200);
        }
            return response()->json('your cart is empty',200);
    }
}
