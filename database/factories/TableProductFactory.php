<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableProductFactory extends Factory
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
            'name'=>$faker->name(),
            'slug'=>$faker->slug(),
            'category_id'=>35,
            "photo" =>  "thumbnails/products/aothun_643bfae8e59ef.jpg",
            "photo1" =>  "thumbnails/products/aothun1_643bfae909dc7.jpg",
            "regular_price" => $faker->numberBetween($min = 100000,$max=30000),
            "sale_price" => $faker->numberBetween($min = 50000,$max=99000),
            "discount" => 10,
            "desc" => $faker->text($maxNbChars = 200),
            "content" => $faker->text($maxNbChars = 600),
            "stock" => $faker->randomDigit(),
            "properties" => json_encode([
                'color'=> $faker->randomElement(['Xanh','Đỏ','Tím','Vàng']),
                'size'=> $faker->randomElement(['S','M','L','XL','2XL','3XL']),
            ]),
            "status" => 1,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ];
    }
}