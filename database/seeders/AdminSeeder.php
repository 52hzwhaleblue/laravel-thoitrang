<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $eloquent = new Admin();

        $created_at = now();

        $faker = Faker::create('vi_VN');

        $updated_at = now();

        $eloquent::create([
            'username'=>"admin",
            'fullname'=>"admin",
            'phone'=> "0879999999",
            'email'=> "admin@gmail.com",
            'password' => Hash::make('admin123'),
            "photo" =>  "thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png",
            "role" => 1,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ]);
    }
}
