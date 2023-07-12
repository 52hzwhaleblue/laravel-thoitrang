<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use Carbon\Carbon;
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
        $carbon = Carbon::now('Asia/Ho_Chi_Minh');
        $created_at = $carbon->format('h:i:s');
        $updated_at = $carbon;
        $status = 1;

        $orderEloquent = new TableOrder();

        $code_random = 'HDF'. Str::random(10);

        for($i = 0; $i < 2; ++$i){
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
                'total_price' => rand(50000,2000000),
                'status_id' => $status, // Mới đặt
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ]);
        }

        $order_detail_eloquent = new TableOrderDetail();

       
         $order_detail_eloquent::create([
                    'order_id' => 1,
                    'product_detail_id' => 1,
                    'product_id' => 1,
                    'quantity' => random_int(1,4),
                    'size' => "M",
                    'price' => 99000,
                    'color'=> "#232645",
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
        ]);

        $order_detail_eloquent::create([
            'order_id' => 1,
            'product_detail_id' => 2,
            'product_id' => 1,
            'quantity' => random_int(1,4),
            'size' => "L",
            'price' => 99000,
            'color'=> "#232645",
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ]);

        $order_detail_eloquent::create([
            'order_id' => 1,
            'product_detail_id' => 3,
            'product_id' => 1,
            'quantity' => random_int(1,4),
            'size' => "XL",
            'price' => 99000,
            'color'=> "#232645",
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        ]);
        
    }
}
