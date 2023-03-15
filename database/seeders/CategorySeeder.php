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
            "All","Men","Women","Shoes","Kid"
        ];

        $list_name_vi = [
            "Tất cả","Đàn ông","Phụ nữ","Giày","Trẻ em"
        ];

        $list_slug = [
            "all","men","women","shoes","kid"
        ];

        $list_category = [
            "thumbnails/categories/All.png",
            "thumbnails/categories/men.png",
            "thumbnails/categories/woman.png",
            "thumbnails/categories/shoes.png",
            "thumbnails/categories/kids.png",
        ];

        $list_photo = [
            "20230307-Category5.webp",
            "20230307-Category5.webp",
            "20230307-Category5.webp",
            "20230307-Category5.webp",
            "20230307-Category5.webp",
        ];

        for($i = 0; $i < 5; $i++){
            DB::table('table_categories')->insert([
                "id" => $list_id[$i],
                "name" => $list_name[$i],
                "name_vi" => $list_name_vi[$i],
                "slug" => $list_slug[$i],
                "photo" => $list_photo[$i],
                "status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
