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

        User::factory()->count(30)->create();

        $eloquent::create([
            'username'=>"minhlong",
            'fullname'=>"Nguyen Vu Minh Long",
            'phone'=> "0705564567",
            'email'=> "josephminhlong@gmail.com",
            'password' => Hash::make('Minhlong@1902'),
            "photo" =>  "thumbnails/avatars/avatar_main.png",
            "role" => 0,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ]);
    }
}
