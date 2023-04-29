<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class TableCategoryFactory extends Factory
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
            "photo" =>  "thumbnails/categories/splist_64413bb852df4.jpg",
            "desc" => $faker->text($maxNbChars = 200),
            "content" => $faker->text($maxNbChars = 600),
            "status" => 1,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ];
    }
}