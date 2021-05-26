<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Menu;
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
    public function store(MenuRequest $request, $restaurantId)
    {
        $restaurant = Restaurant::find($restaurantId);
        if(empty($restaurant)){
            return response()->json("Restaurant Not Found",404);
        }
        Menu::create([
            "restaurant_id"=>$restaurantId,
            "name"=>$request->name,
            "ingredient"=>$request->ingredient,
            "description" => $request->description,
            "price"=>$request->price,
        ]);
        return response()->json("Menu Created",200);

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
    public function update(MenuRequest $request, $menuId)
    {
        $menu = Menu::find($menuId);
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
}
