<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Comment extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
