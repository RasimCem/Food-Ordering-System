<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Menu;
class CartController extends Controller
{
    public function addItemToCart($menuId){
        $newItemRestaurantId = Menu::find($menuId)->restaurant_id;
        $myCart =  Cart::where('user_id',Auth::user()->id)->with('menus')->first();
      // return response()->json($newItemRestaurantId." ".$restaurantIdInMyCart,200);
      if($myCart){
        if($myCart->menus->restaurant_id  == $newItemRestaurantId){
            Cart::create([
                "menu_id"=>$menuId,
                "user_id"=> Auth::user()->id
            ]);
            return response()->json('Item Added to Cart',200);
        }else{
            return response()->json('You already have items in your cart!',406);
        }
      }
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
        $carts = Cart::where('user_id',Auth::user()->id)->with('menus')->get();
        if($carts){
            foreach($carts as $cart){
                if($cart->menus->image){
                    $cart->menus->image = url('/images/'.$cart->menus->image);
                }
            }
            return response()->json($carts,200);
        }
            return response()->json('your cart is empty',403);
    }
}
