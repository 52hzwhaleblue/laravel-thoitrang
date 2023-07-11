<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('vi_VN');

        return [
            "user_id" => rand(1,10),
            "order_id" =>null,
            'product_id' => rand(1,30),
            "star" =>  rand(3,5),
            "content" => $faker->text(100),
//            "status" => 1,
        ];
    }
}
