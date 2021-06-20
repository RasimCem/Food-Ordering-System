<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function createMySliderImage(Request $request){
        $date = Carbon::now()->toDateString();
        $fileName = $date."-".uniqid().".".$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->move(public_path('images'),$fileName);
        $imageUrl = url('/images/'.$fileName);
        $myRestaurantId = Auth::user()->restaurantOwner->restaurant_id;
        Slider::create([
            "restaurant_id"=>$myRestaurantId,
            "image"=>$fileName
        ]);
        return response()->json(['url' =>$imageUrl],201);
    }

   public function updateMySliderImage(Request $request,$sliderId){
        $imagePath = 'images/'.Slider::where('id',$sliderId)->first()->image;
        // delete the previous image
        if(file_exists($imagePath)) {
            @unlink($imagePath);
        }
        $date = Carbon::now()->toDateString();
        $fileName = $date."-".uniqid().".".$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->move(public_path('images'),$fileName);
        $imageUrl = url('/images/'.$fileName);
        $myRestaurantId = Auth::user()->restaurantOwner->restaurant_id;
        Slider::where('id',$sliderId)->where('restaurant_id',$myRestaurantId)->update([
            "image"=>$fileName
        ]);
        return response()->json(['url' =>$imageUrl],200);

   }

   public function getSlidersOfTheRestaurant($restaurantId){
        $sliders = Slider::where('restaurant_id',$restaurantId)->paginate(3);
        foreach($sliders as $slider){
            $slider->image = url('/images/'.$slider->image);
        }
        return response()->json($sliders,200);
   }
}
