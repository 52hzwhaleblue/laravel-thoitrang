<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
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

        $status = -1;

        $orderEloquent = new TableOrder();

        $code_random = 'HDF'. Str::random(10);

        for($i = 0; $i < 10; ++$i){
            $orderEloquent::create([
                'code' => $code_random,
                'user_id' => $i+1,
                'shipping_fullname' => $faker->name(),
                'shipping_phone' =>  $faker->phoneNumber(),
                'shipping_address'=>  $faker->address(),
                'payment_method' => "COD",
                'temp_price' => 500000,
                'ship_price' => 0,
                'notes' => ".....Note",
                'total_price' => 500000,
                'status' => $status, //-1 is order successfully
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ]);
        }
        
        
        $faker_size = [
            "M",
             "35",

        ];  

        $faker_color= [
            "00a8ff",
             "f7f1e3",
        ];  

        $order_detail_eloquent = new TableOrderDetail();

        $random_product = [1,3,5,7,9,11,13,15,17,19];

        for($k = 0; $k < 10; ++$k){
            for($i = 0; $i< 2; ++$i){
                $product_id =  $random_product[$k];
                if($i == 1){
                   ++$product_id;
                }
                $order_detail_eloquent::create([
                    'order_id' => $k+1,
                    'product_id' => $product_id,
                    'quantity' => random_int(1,10),
                    'size' => $faker_size[$i],
                    'color'=> $faker_color[$i],
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ]);
            }
        }
    }
}
