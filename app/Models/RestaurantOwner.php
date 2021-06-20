<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantOwner extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $timestamps = false;

    public function myRestaurant(){
        return $this->hasOne(Restaurant::class,'id','restaurant_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
