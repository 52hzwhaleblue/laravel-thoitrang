<?php

namespace Database\Seeders;

use App\Models\TableReview;
use App\Models\TableReviewDetail;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');

        $created_at = now();

        $updated_at = now();

        $content = $faker->text();

        $reviewEloquent = new TableReview();


        $random_star = random_int(3,5);

        
        $random_product = [1,3,5,7,9,11,13,15,17,19];

        for($k = 0; $k < 10; ++$k){
            for($i = 0; $i< 2; ++$i){
                $product_id =  $random_product[$k];
                if($i == 1){
                   ++$product_id;
                }
                 $reviewEloquent::create([
                    "user_id" => $k+1,
                    "order_id" => $k+1,
                    'product_id' => $product_id,
                    "star" =>  $random_star,
                    "content" => $content,
                    'photos' => json_encode(["thumbnails/reviews/test_review.jpg"]),
                    "created_at" =>  $created_at,
                    "updated_at" => $updated_at,
                ]);
        }
    }
    
    }
}
