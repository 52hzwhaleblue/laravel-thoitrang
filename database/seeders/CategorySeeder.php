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
            "All","Men","Women","Shoes","Kid"
        ];

        $list_name_vi = [
            "Tất cả","Đàn ông","Phụ nữ","Giày","Trẻ em"
        ];

        $list_category = [
            "thumbnails/categories/All.png",
            "thumbnails/categories/men.png",
            "thumbnails/categories/woman.png",
            "thumbnails/categories/shoes.png",
            "thumbnails/categories/kids.png",
        ];

        for($i = 0; $i < 5; $i++){
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
