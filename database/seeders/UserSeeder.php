<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eloquent = new User;
        $eloquent::create([
            'username'=>"naninani@1",
            'fullName'=>"Hoài Chương",
            'phone'=> "0918031587",
            'email'=> "nhchuong2001@gmail.com",
            'password' => Hash::make('123456789'),
            "photo" =>  "thumbnails/avatars/avatar.jpg",
            "role" => 1,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        $eloquent::create([
            'username'=>"abc@1",
            'fullName'=>"Admin",
            'phone'=> "xxxxxx",
            'email'=> "xxxxx@gmail.com",
            'password' => Hash::make('123456789'),
            "photo" =>  "thumbnails/avatars/avatar.jpg",
            "role" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
    }
}