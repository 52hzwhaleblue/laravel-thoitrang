<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\TablePromotion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = now();

        $faker = Faker::create('vi_VN');

        $updated_at = now();

        $promotions = [
            [
                'code' => Str::random(5),
                'product_id'=>null,
                'desc'=> $faker->paragraph(2),
                'order_price_conditions'=> 250000,
                'discount_price' => 5,
                'litmit'=> random_int(10,20),
                "end_date" => Carbon::now()->addMonth(1),
                "created_at" => $created_at ,
                "updated_at" => $updated_at ,
            ],
            [
                'code' => Str::random(5),
                'product_id'=>null,
                'desc'=> $faker->paragraph(2),
                'order_price_conditions'=> 500000,
                'discount_price' => 15,
                'litmit'=> random_int(10,20),
                "end_date" => Carbon::now()->addMonth(1),
                "created_at" => $created_at ,
                "updated_at" => $updated_at ,
            ]
        ];

        DB::table('table_promotions')->insert($promotions);
    }
}