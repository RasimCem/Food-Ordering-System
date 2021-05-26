<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserProfileRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
class UserController extends Controller
{
    // login ve logout
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
       $accessToken = $user->createToken('authToken')->accessToken;
        return response()->json(["message"=>"success","access_token"=>$accessToken],201);

   }

   public function login(UserLoginRequest $request){
        //$user = User::where('mail',$request->mail)->where('password',$request->password)->first();
        if(Auth::attempt(['mail' => $request->mail, 'password' => $request->password])){
            $user = $request->user();
            $accessToken = $user->createToken('authToken')->accessToken;
                return response()->json(["message"=>"success","access_token"=>$accessToken],201);
        }
        return response()->json(["message"=>"Unauthorized"],401);
   }

   public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!','user'=>$request->user()];
        return response($response, 200);
   }

   public function getAllUsers(){
        return UserResource::collection(User::all());
   }

   public function updateContactInformation(CustomerRequest $request,$userId){
        $customer = Customer::where('user_id',$userId)->get();
       if($customer->isNotEmpty()){
            Customer::where('user_id',$userId)
            ->update([
                "phone"=>$request->phone,
                "country"=>$request->country,
                "city"=>$request->city,
                "district"=>$request->district,
                "street"=>$request->street,
                "address_description"=>$request->address_description
            ]);
            return response()->json('Details Updated',201);
       }else{
           Customer::create([
                "user_id"=>$request->userId,
                "phone"=>$request->phone,
                "country"=>$request->country,
                "city"=>$request->city,
                "district"=>$request->district,
                "street"=>$request->street,
                "address_description"=>$request->address_description
           ]);
             return response()->json('Details Created',201);
       }
   }
   public function updateUserInformation(UserProfileRequest $request, $userId){
        User::find($userId)->update([
            "name"=>$request->name,
            "surname"=>$request->surname
        ]);
        return response()->json('Profile Updated',201);
   }
}
