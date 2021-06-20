<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserProfileRequest;
class AdminController extends Controller
{
    public function showMyInformation(){
        $user = User::where('id',Auth::user()->id)->first();
        $user->admin;
        return response()->json($user,200);
       }

       public function updateMyInformationForAdmin(UserProfileRequest $request){
        $user = User::find(Auth::user()->id)->update([
            "name"=>$request->name,
            "surname"=>$request->surname,
        ]);
        return response()->json("Profile Updated",200);
    }
}
