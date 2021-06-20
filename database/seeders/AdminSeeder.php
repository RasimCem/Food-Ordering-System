<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name"=>"Admin",
            "surname"=>"Admin",
            "mail"=>"admin@gmail.com",
            "password"=>Hash::make("admin123456"),
            "role"=>"admin"
        ]);
        Admin::create([
            "user_id"=>$admin->id
        ]);
    }
}
