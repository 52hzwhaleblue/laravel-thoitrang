<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_name = [
            "Mới đặt","Đã xác nhận","Đang giao hàng","Đã giao","Đã hủy"
        ];

        $list_class_order = [
            "text-primary","text-info","text-warning","text-success", "text-danger"
        ];

        $query = DB::table('table_order_status');

        for($i = 0; $i < 5; $i++){

            $query->insert([
                "name" => $list_name[$i],
                "class_order" => $list_class_order[$i],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
