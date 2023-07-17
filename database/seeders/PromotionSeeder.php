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
                'name' => "Giảm 10%",
                'code' => "I2sy4",
                'product_id'=>null,
                'desc'=> "cho đơn từ 400k",
                'order_price_conditions'=> 400000,
                'discount_price' => 10,
                'limit'=> 20,
                "end_date" => Carbon::now()->addMonth(1),
                "created_at" => $created_at ,
                "updated_at" => $updated_at ,
            ],
            [
                'name' => "Giảm 20%",
                'code' => "UNJK20",
                'product_id'=>null,
                'desc'=> "cho đơn hàng từ 500000",
                'order_price_conditions'=> 500000,
                'discount_price' => 20,
                'limit'=> random_int(10,20),
                "end_date" => Carbon::now()->addMonth(1),
                "created_at" => $created_at ,
                "updated_at" => $updated_at ,
            ],
            [
                'name' => "Giảm 35%",
                'code' => "9b8qP",
                'product_id'=>null,
                'desc'=> "cho đơn hàng từ 700000",
                'order_price_conditions'=> 700000,
                'discount_price' => 35,
                'limit'=> random_int(10,20),
                "end_date" => Carbon::now()->addMonth(1),
                "created_at" => $created_at ,
                "updated_at" => $updated_at ,
            ],
            [
                'name' => "Giảm 40%",
                'code' => "9b8qP",
                'product_id'=>null,
                'desc'=> "cho đơn hàng từ 1000000",
                'order_price_conditions'=> 1000000,
                'discount_price' => 40,
                'limit'=> random_int(10,20),
                "end_date" => Carbon::now()->addMonth(1),
                "created_at" => $created_at ,
                "updated_at" => $updated_at ,
            ],

        ];

        DB::table('table_promotions')->insert($promotions);
    }
}
