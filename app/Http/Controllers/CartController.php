<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class CartController extends Controller
{
    public function addItemToCart($menuId){
        Cart::create([
            "menu_id"=>$menuId,
            "user_id"=> Auth::user()->id
        ]);
        return response()->json('Item Added to Cart',200);
    }

    public function removeItemFromCart($cartId){
        $removedItem = Cart::where('user_id',Auth::user()->id)->where('id',$cartId)->first()->delete();
        if($removedItem){
            return response()->json('Item Removed From Cart',200);
        }
        return response()->json('This Item is not Exist',404);
    }

    public function showMyCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->with('menus')->get();
        if($cart){
            return response()->json($cart,200);
        }
            return response()->json('your cart is empty',200);
    }
}
