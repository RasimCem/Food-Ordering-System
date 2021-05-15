<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
}
