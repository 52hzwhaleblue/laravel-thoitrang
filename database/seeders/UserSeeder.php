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
        User::create([
            'username'=>"naninani@1",
            'fullName'=>"Hoài Chương",
            'phone'=> "0918031587",
            'email'=> "nhchuong2001@gmail.com",
            'password' => Hash::make('123456789'),
            "photo" =>  "thumbnails/avatar/avatar.jpg",
            "role" => 1,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        User::create([
            'username'=>"abc@1",
            'fullName'=>"Admin",
            'phone'=> "xxxxxx",
            'email'=> "xxxxx@gmail.com",
            'password' => Hash::make('123456789'),
            "photo" =>  "thumbnails/avatar/avatar.jpg",
            "role" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
    }
}