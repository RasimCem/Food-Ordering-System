<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\RestaurantOwner;
use App\Http\Resources\MenuResource;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMyMenu(MenuRequest $request)
    {
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        Menu::create([
            "restaurant_id"=>$restaurantId,
            "name"=>$request->name,
            "ingredient"=>$request->ingredient,
            "description" => $request->description,
            "price"=>$request->price,
        ]);
        return response()->json("Menu Created",200);

    }

    public function showMyMenu(){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        return MenuResource::collection(Menu::where('restaurant_id',$restaurantId)->get());
    }

    public function deleteMyMenu($menuId){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        Menu::where('id',$menuId)->where('restaurant_id',$restaurantId)->delete();
        return response()->json('Menu Deleted',200);
    }

    public function getMyMenuById($menuId){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $menu  = Menu::where('id',$menuId)->where('restaurant_id',$restaurantId)->first();
        return response()->json($menu,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($restaurantId)
    {
        $restaurant = Restaurant::find($restaurantId);
        if(empty($restaurant)){
            return response()->json("Restaurant Not Found",404);
        }
        $menu = Menu::where('restaurant_id',$restaurantId)->get();
        return MenuResource::collection($menu);
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
            $menu->update([
                "name"=>$request->name,
                "ingredient"=>$request->ingredient,
                "description" => $request->description,
                "price"=>$request->price,
            ]);
            return response()->json("Menu Updated",200);
        }
        return response()->json("Menu Not Found",404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
        ]);
        return response()->json('Menu Updated',200);
    }
}
