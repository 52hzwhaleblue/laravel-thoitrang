<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("table_review_detail")->insert(
            [
                "review_id" => 1,
                "photo" => "thumbnails/reviews/test_review.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );

        DB::table("table_review_detail")->insert(
            [
                "review_id" => 1,
                "photo" => "thumbnails/reviews/test_review.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );

        DB::table("table_review_detail")->insert(
            [
                "review_id" => 2,
                "photo" => "thumbnails/reviews/test_review.jpg",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]
        );
        DB::table("table_review_detail")->insert(
            
                [
                    "review_id" => 3,
                    "photo" => "thumbnails/reviews/test_review.jpg",
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                ],
        );
         
           
    }
}
