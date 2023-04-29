<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_at = now();

        $faker = Faker::create('vi_VN');

        $updated_at = now();

        return [
            'username'=>$faker->userName(),
            'fullName'=>$faker->name(),
            'phone'=> $faker->phoneNumber(),
            'email'=> $faker->email(),
            'password' => Hash::make('123456789'),
            "photo" =>  "thumbnails/avatars/42ea1f2bdeefb978bb7cbab49cfc08b2_644be05a96383.png",
            "role" => 1,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ];
    }
}
