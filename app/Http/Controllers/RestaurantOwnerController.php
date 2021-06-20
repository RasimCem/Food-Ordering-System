<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\OwnerProfileRequest;
use App\Models\RestaurantOwner;
use App\Http\Requests\OwnerCreationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailSender;
class RestaurantOwnerController extends Controller
{
    public function showMyInformation(){
        $user = User::where('id',Auth::user()->id)->first();
        $user->restaurantOwner;
        return response()->json($user,201);
    }

    public function updateMyInformation(OwnerProfileRequest $request){
        $user = User::find(Auth::user()->id)->update([
            "name"=>$request->name,
            "surname"=>$request->surname,
        ]);
        RestaurantOwner::where('user_id',Auth::user()->id)->update([
            "phone"=>$request->phone
        ]);
        return response()->json("Profile Updated",200);
   }

   public function createRestaurantOwnerForRestaurant(OwnerCreationRequest $request, $restaurantId){
        $user = User::create([
            "name"=>$request->name,
            "surname"=>$request->surname,
            "mail"=>$request->mail,
            "password"=>Hash::make($request->password),
            "role"=>"restaurantOwner"
        ]);
        RestaurantOwner::create([
            "user_id"=>$user->id,
            "restaurant_id"=>$restaurantId,
            "phone"=>$request->phone
        ]);

        $dataToSend = [
            'title'=>' FOOD ORDERING SYSTEM',
            'bodyFirst'=>'Welcome to Food Ordering System. Your account has been activated.',
            'bodySecond'=> 'You can login to the system by using this password: '.$request->password,
        ];
        Mail::to($request->mail)->send(new MailSender($dataToSend));
        return response()->json('Owner Created',201);
    }
}
