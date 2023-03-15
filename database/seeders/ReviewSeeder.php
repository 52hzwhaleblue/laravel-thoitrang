<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("table_reviews")->insert(
            [
                "user_id" => 1,
                "product_id"=> 1,
                "star" => 5.0,
                "content" => "123",
                "status" => true,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );
        DB::table("table_reviews")->insert(
            [
                "user_id" => 1,
                "product_id"=> 1,
                "star" => 5.0,
                "content" => "456",
                "status" => true,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );
        DB::table("table_reviews")->insert(
            [
                "user_id" => 1,
                "product_id"=> 1,
                "star" => 4.0,
                "content" => "789",
                "status" => true,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );
        DB::table("table_reviews")->insert(
            [
                "user_id" => 1,
                "product_id"=> 1,
                "star" => 4.0,
                "content" => "101112",
                "status" => true,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );
    }
}
