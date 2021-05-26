<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function menus(){
        return $this->hasOne(Menu::class,'id','menu_id');
    }
}
