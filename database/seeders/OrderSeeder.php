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
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        
        $faker_size = [
            "M (42-50kg)",
             "35",
             "36",
             "M (36-44kg:M42-M52)",
             "Size 5: 12kg - 14kg.",
             "12kg - 14kg.",
             "L (53-64kg)",
             "XXL (76-85kg)",
             "S (40-46kg)",
             "M 47.5-52.5kg",
             "Dưới 48kg",
        ];  

        $faker_color= [
            "00a8ff",
             "f7f1e3",
             "f7f1e3",
             "ffffff",
             "ffffff",
             "ff5252",
             "ff4d4d",
             "ffffff",
             "000000",
             "000000",
             "82ccdd",
        ];  

        for($i = 1; $i<= 10; ++$i){
            DB::table('table_order_details')->insert([
                'order_id' => $order->id,
                'product_id' => $i,
                'quantity' => random_int(1,10),
                'size' => $faker_size[$i],
                'color'=> $faker_color[$i],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
