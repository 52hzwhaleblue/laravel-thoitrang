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
        $list_id = [
           1,2,3,4,5
        ];

        $list_name = [
            "All","Clothing","Handbag","Shoes","Watch","Sunglasses"
        ];

        $list_name_vi = [
            "Tất cả","Quần-Áo","Túi xách","Giày","Đồng hồ", "Mắt kính"
        ];
        $list_slug= [
            "ao_ba_lo_do.jpg" ,
            "ao_cotton_kid.jpg",

            "ao_phong_unisex_black_white_2.jpg",


            "ao-polo-nam-Aristino-xanh.jpg",
            "dam_han_quoc_den_nau-nhat.jpg",

            "guoc_cao_no_white.jpg"

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
                "slug" => $list_slug[$i],
                "photo" => $list_category[$i],
                "status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
