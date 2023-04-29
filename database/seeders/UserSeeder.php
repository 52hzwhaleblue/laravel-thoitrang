<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
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

        $created_at = now();

        $faker = Faker::create('vi_VN');

        $updated_at = now();

        User::factory()->count(10)->create();

        $eloquent::create([
            'username'=>"abc@1",
            'fullName'=>"Admin",
            'phone'=> "xxxxxx",
            'email'=> "xxxxx@gmail.com",
            'password' => Hash::make('123456789'),
            "photo" =>  "thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png",
            "role" => 0,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ]);
    }
}