<?php

namespace App\Models;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RestaurantOwner;
class Restaurant extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function restaurantOwner(){
        return $this->belongsTo(RestaurantOwner::class,'id','restaurant_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'restaurant_id','id');
    }
}
