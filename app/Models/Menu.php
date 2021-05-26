<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function menus(){
        $this->hasOne('App\Models\Cart','menu_id','id');
    }
}
