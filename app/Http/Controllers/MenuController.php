<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\RestaurantOwner;
use App\Http\Resources\MenuResource;
use Carbon\Carbon;
class MenuController extends Controller
{

    public function createMyMenu(MenuRequest $request)
    {
        $fileName=null;
        if($request->file('image')){
            $date = Carbon::now()->toDateString();
            $fileName = $date."-".uniqid().".".$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->move(public_path('images'),$fileName);
        }
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        Menu::create([
            "restaurant_id"=>$restaurantId,
            "name"=>$request->name,
            "ingredient"=>$request->ingredient,
            "description" => $request->description,
            "price"=>$request->price,
            "cal"=>$request->cal,
            "image"=>$fileName
        ]);
        return response()->json("Menu Created",200);

    }

    public function showMyMenus(){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $menus = Menu::where('restaurant_id',$restaurantId)->get();
        foreach($menus as $menu){
            $menu->image = url('/images/'. $menu->image);
        }
        return MenuResource::collection($menus);
    }

    public function deleteMyMenu($menuId){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $menu = Menu::where('id',$menuId)->where('restaurant_id',$restaurantId);
        $oldImage =$menu->first()->image;
        if($oldImage){
            @unlink('images/'.$oldImage);
        }
        $menu->delete();
        return response()->json('Menu Deleted',200);
    }

    public function getMyMenuById($menuId){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $menu  = Menu::where('id',$menuId)->where('restaurant_id',$restaurantId)->first();
        if($menu->image){
            $menu->image =url('/images/'. $menu->image);
        }
        return response()->json($menu,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllMenusOfTheRestaurant($restaurantId)
    {
        $restaurant = Restaurant::find($restaurantId);
        if(empty($restaurant)){
            return response()->json("Restaurant Not Found",404);
        }
        $menus = Menu::where('restaurant_id',$restaurantId)->get();
        foreach($menus as $menu){
            if($menu->image){
                $menu->image = url('/images/'.$menu->image);
            }
        }
        return MenuResource::collection($menus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMyMenu(MenuRequest $request, $menuId)
    {
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $menu  = Menu::where('id',$menuId)->where('restaurant_id',$restaurantId)->first();
        if($menu){
            if($request->file('image')){
                if(file_exists('images/'.$menu->image)) {
                    @unlink('images/'.$menu->image);
                }
                $date = Carbon::now()->toDateString();
                $fileName = $date."-".uniqid().".".$request->file('image')->getClientOriginalExtension();
                $path = $request->file('image')->move(public_path('images'),$fileName);
                $menu->update([
                    "name"=>$request->name,
                    "ingredient"=>$request->ingredient,
                    "description" => $request->description,
                    "price"=>$request->price,
                    "cal"=>$request->cal,
                    "image"=>$fileName
                ]);
                return response()->json("Menu Updated",200);

            }else{
                $menu->update([
                    "name"=>$request->name,
                    "ingredient"=>$request->ingredient,
                    "description" => $request->description,
                    "price"=>$request->price,
                    "cal"=>$request->cal,
                ]);
            return response()->json("Menu Updated",200);
            }
        }
        return response()->json("Menu Not Found",404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMenu($id)
    {
        $menu = Menu::find($id);
        if($menu){
            $menu->delete();
			return response()->json("Menu Deleted",200);
		}
		return response()->json("Menu Not Found",404);
    }

    public function showMenu($menuId){
        return new MenuResource(Menu::where('id',$menuId)->first());
    }

    public function updateMenu(MenuRequest $request, $menuId){
        Menu::where('id',$menuId)->first()->update([
            "name"=>$request->name,
            "ingredient"=>$request->ingredient,
            "description" => $request->description,
            "price"=>$request->price,
            "cal"=>$request->cal
        ]);
        return response()->json('Menu Updated',201);
    }
}
