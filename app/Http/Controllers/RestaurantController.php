<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\User;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $userDetails = User::find($user->id)->customer();
            //$user['user_details']=$userDetails;
            $country = $userDetails->country;
            $city = $userDetails->city;
            $district = $userDetails->district;
            return RestaurantResource::collection(Restaurant::where('country',$country)
            ->where('city',$city)
            ->where('district',$district)->get());
        }else{
            $ip =request()->ip();
            $data = Location::get($ip);
            if (!$data){
                return RestaurantResource::collection(Restaurant::all()->take(7));
            }
            $city = $data->cityName;
            return RestaurantResource::collection(Restaurant::where('city',$city)->get());
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        Restaurant::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "chef" => $request->chef,
            "country"=>$request->country,
            "city"=>$request->city,
            "district" => $request->district
        ]);
        return response()->json("Restaurant Created",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(RestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::find($id);
        if($restaurant){
            $restaurant->update([
                'name' => $request->name,
                'description' => $request->description,
                'chef' => $request->chef,
                'country'=>$request->country,
                'city'=>$request->city,
                'district'=>$request->district
            ]);
            return response()->json("Restaurant Updated",200);
        }
        return response()->json("Restaurant Not Found",404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        if($restaurant){
            $restaurant->delete();
			return response()->json("Restaurant Deleted",200);
		}
		return response()->json("Restaurant Not Found",404);
    }

    public function searchForRestaurant($restaurantName){
        $restaurant = Restaurant::where('name','LIKE','%'.$restaurantName.'%')->get();
        return RestaurantResource::collection($restaurant);
    }
}
