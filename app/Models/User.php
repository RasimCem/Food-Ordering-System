<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable  = ['name','surname','password','mail','role'];
	protected $hidden = [
        'password', 'remember_token',
    ];
    use HasApiTokens, HasFactory;
    // public function getUserDetails(){
    //     return $this->belongsTo(Customer::class);
    // }
}
