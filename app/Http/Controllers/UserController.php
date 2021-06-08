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
        $user = User::where('mail',$request->mail)->first();
        if(Auth::attempt(['mail' => $request->mail, 'password' => $request->password])){
            $user = $request->user();
            $accessToken = $user->createToken('authToken')->accessToken;
            return response()->json(["message"=>"success","role"=>$user->role,"access_token"=>$accessToken],201);
        }
        return response()->json(["message"=>"Unauthorized"],401);
   }

   public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!','user'=>$request->user()];
        return response($response, 200);
   }

   public function getAllCustomers(){
        $customers = User::where('role','customer')->get();
        foreach($customers as $customer){
            $customer->customer;
        }
        return UserResource::collection($customers);
   }

   public function updateContactInformation(CustomerRequest $request){
        $customer = Customer::where('user_id',Auth::user()->id)->get();
       if($customer->isNotEmpty()){
            Customer::where('user_id',Auth::user()->id)
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
                "user_id"=>Auth::user()->id,
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
   public function updateUserInformation(UserProfileRequest $request){
        User::find(Auth::user()->id)->update([
            "name"=>$request->name,
            "surname"=>$request->surname
        ]);
        return response()->json('Profile Updated',201);
   }

   public function showMyInformation(){
        $user = User::where('id',Auth::user()->id)->first();
        $user['contact'] = $user->customer();
        return response()->json($user,201);
   }

   public function getCustomerInformation($customerId){
        $customer =  User::where('id',$customerId)->first();
        $customer->customer;
        return response()->json($customer,200);

   }

   public function updateCustomerInformation(UserProfileRequest $request,$customerId){
        User::where('id',$customerId)->where('role','customer')->update([
            "name"=>$request->name,
            "surname"=>$request->surname
        ]);
        return response()->json('Customer Profile Updated',201);
   }

   public function updateCustomerContactInformation(CustomerRequest $request,$customerId){
    $customer = Customer::where('user_id',$customerId)->get();
    if($customer->isNotEmpty()){
         Customer::where('user_id',$customerId)
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
             "user_id"=>$customerId,
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

   public function deleteCustomer($id){
        User::where('id',$id)->first()->delete();
        return response()->json("Customer Deleted!",200);
   }
}
