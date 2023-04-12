<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\TableOrder;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = TableOrder::create([
            'code' => 'HDF'. Str::random(10),
            'user_id' => 1,
            'shipping_fullname' => 'chuong',
            'shipping_phone' => "0918031587",
            'shipping_address'=> '12 Hồ Thành Biên, P.4, Q.8, TP HCM',
            'order_payment' => "COD",
            'temp_price' => 500000,
            'ship_price' => 0,
            'notes' => ".....Note",
            'total_price' => 500000,
            'status' => -1, //-1 is order successfully
            "created_at" =>now(),
            "updated_at" =>now(),
        ]);
        
        $faker_size = [
            "M",
             "35",
             "36",
             "M",
             "XL",
        ];  

        $faker_color= [
            "00a8ff",
             "f7f1e3",
             "f7f1e3",
             "ffffff",
             "ffffff",
        ];  
        $query = DB::table('table_order_details');

        for($i = 0; $i< 5; ++$i){
            $query->insert([
                'order_id' => $order->id,
                'product_id' => $i+1,
                'quantity' => random_int(1,10),
                'size' => $faker_size[$i],
                'color'=> $faker_color[$i],
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
