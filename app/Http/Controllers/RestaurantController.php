<?php

namespace App\Http\Controllers;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchForRestaurant($restaurantName){
        $restaurant = Restaurant::where('name','LIKE','%'.$restaurantName.'%')->get();
        return RestaurantResource::collection($restaurant);
    }
}
