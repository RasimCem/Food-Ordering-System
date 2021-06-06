<?php

namespace App\Models;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Order extends Model
{
    protected $fillable = ['user_id','restaurant_id','status','content','total_price'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'restaurant_id','id');
    }

    public function comments(){
        return $this->hasOne(Comment::class,'order_id','id');
    }
}
