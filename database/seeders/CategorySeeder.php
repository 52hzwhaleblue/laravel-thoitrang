<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_name = [
            "All","Clothing","Handbag","Shoes","Watch","Sunglasses"
        ];

        $list_name_vi = [
            "Tất cả","Quần-Áo","Túi xách","Giày","Đồng hồ", "Mắt kính"
        ];

        $list_category = [
            "thumbnails/categories/All.png",
            "thumbnails/categories/t-shirt.png",
            "thumbnails/categories/handbag.png",
            "thumbnails/categories/shoes.png",
            "thumbnails/categories/watch.png",
            "thumbnails/categories/sunglasses.png",
        ];

        for($i = 0; $i < 6; $i++){
            DB::table('table_categories')->insert([
                "name" => $list_name[$i],
                "name_vi" => $list_name_vi[$i],
                "photo" => $list_category[$i],
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
