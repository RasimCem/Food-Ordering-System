<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\User;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantOwner;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Carbon;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRestaurantsInMyLocation()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $userDetails = User::find($user->id)->customer;
            //$user['user_details']=$userDetails;
            $country = $userDetails->country;
            $city = $userDetails->city;
            $district = $userDetails->district;
            $restaurants = Restaurant::where('country',$country)
            ->where('city',$city)
            ->where('district',$district)->get();
            foreach($restaurants as $restaurant){
                if($restaurant->image){
                    $restaurant->image = url('/images/'.$restaurant->image);
                }
            }
            return RestaurantResource::collection($restaurants);
        }else{
            $ip =request()->ip();
            $data = Location::get($ip);
            if (!$data){
                $restaurants = Restaurant::all()->take(7);
                foreach($restaurants as $restaurant){
                    if($restaurant->image){
                        $restaurant->image = url('/images/'.$restaurant->image);
                    }
                }
                return RestaurantResource::collection($restaurants);
            }
            $city = $data->cityName;
            $restaurants =Restaurant::where('city',$city)->get();
            foreach($restaurants as $restaurant){
                if($restaurant->image){
                    $restaurant->image = url('/images/'.$restaurant->image);
                }
            }
            return RestaurantResource::collection($restaurants);
        }


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRestaurant(RestaurantRequest $request)
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRestaurant(RestaurantRequest $request, $id)
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
    public function deleteRestaurant($id)
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

    public function getMyRestaurantDetails(){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $restaurant = Restaurant::where('id',$restaurantId)->first();
        if($restaurant->image){
            $restaurant->image =  url('/images/'.$restaurant->image);
        }
        return response()->json($restaurant,200);
    }

    public function updateMyRestaurantDetails(RestaurantRequest $request){
        $restaurantId = RestaurantOwner::where('user_id',Auth::user()->id)->first()->restaurant_id;
        $restaurant  = Restaurant::where('id',$restaurantId)->first();
        if($request->file('restaurantImage')){
            if(file_exists('images/'.$restaurant->image)) {
                @unlink('images/'.$restaurant->image);
            }
            $date = Carbon::now()->toDateString();
            $fileName = $date."-".uniqid().".".$request->file('restaurantImage')->getClientOriginalExtension();
            $path = $request->file('restaurantImage')->move(public_path('images'),$fileName);
           $restaurant->update([
                'name' => $request->name,
                'description' => $request->description,
                'chef' => $request->chef,
                'country'=>$request->country,
                'city'=>$request->city,
                'district'=>$request->district,
                'image'=>$fileName
            ]);
        }else{
            $restaurant->update([
                'name' => $request->name,
                'description' => $request->description,
                'chef' => $request->chef,
                'country'=>$request->country,
                'city'=>$request->city,
                'district'=>$request->district
            ]);
        }
        return response()->json("Restaurant Updated",200);
    }

    public function getAllRestaurants(){
        $restaurants = Restaurant::all();
        foreach($restaurants as $restaurant){
            $restaurant->restaurantOwner;
        }
       return RestaurantResource::collection($restaurants);
    }

    public function getRestaurantById($restaurantId){
        $restaurant = Restaurant::where('id',$restaurantId)->first();
        if(isset($restaurant->restaurantOwner)){
            $restaurant->restaurantOwner->user;
        }
        $sliders = $restaurant->sliders;
         foreach($sliders as $slider){
            $slider->image = url('/images/'.$slider->image);
        }
        return new RestaurantResource($restaurant);
    }
}
