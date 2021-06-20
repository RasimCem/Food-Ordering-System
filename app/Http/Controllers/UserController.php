<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;

use App\Http\Requests\OwnerProfileRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserProfileRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\RestaurantOwner;
use App\Http\Requests\PasswordUpdateRequest;

class UserController extends Controller
{
   public function register(UserRegistrationRequest $request){
    // $user = User::create($request->validated);
       $hashedPassword = Hash::make($request->password);
       $user = User::create([
           "name"=>$request->name,
           "surname"=>$request->surname,
           "mail"=>$request->mail,
           "password"=>$hashedPassword,
           "role"=>"customer"
       ]);
       Customer::create([
           "user_id"=>$user->id
       ]);
       $accessToken = $user->createToken('authToken')->accessToken;
        return response()->json(["message"=>"success","access_token"=>$accessToken],201);

   }

   public function login(UserLoginRequest $request){
        $user = User::where('mail',$request->mail)->first();
        if(Auth::attempt(['mail' => $request->mail, 'password' => $request->password])){
            $user = $request->user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json(["message"=>"success","role"=>$user->role,"access_token"=>$accessToken],201);
        }
        return response()->json(["error"=>"User Not Found"],404);
   }

   public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!','user'=>$request->user()];
        return response($response, 200);
   }

   public function updateMyPassword(PasswordUpdateRequest $request){
        $user = User::find(Auth::user()->id);
        if(Hash::check($request->oldPassword, $user->password)){
           $user->update([
               "password"=>Hash::make($request->newPassword)
           ]);
           return response()->json("Password Updated",200);
        }
        return response()->json("Old Password Is Not Correct",404);
   }

}
