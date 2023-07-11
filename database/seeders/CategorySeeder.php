<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TableCategory;
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
            "Clothing","Handbag","Shoes","Watch","Sunglasses","Hat","Jewelry"
        ];

        $list_name_vi = [
            "Quần-Áo","Túi xách","Giày-dép","Đồng hồ", "Mắt kính","Nón","Trang sức"
        ];

        $list_slug= [
            "ao_cotton_kid.jpg",
            "ao_phong_unisex_black_white_2.jpg",
            "ao-polo-nam-Aristino-xanh.jpg",
            "dam_han_quoc_den_nau-nhat.jpg",
            "guoc_cao_no_white.jpg",
            "guoc_cao_no_white.jpg",
            "guoc_cao_no_white.jpg",
        ];

        $list_category = [
            "thumbnails/categories/t-shirt.png",
            "thumbnails/categories/handbag.png",
            "thumbnails/categories/shoes.png",
            "thumbnails/categories/watch.png",
            "thumbnails/categories/sunglasses.png",
            "thumbnails/categories/hat.png",
            "thumbnails/categories/Jewelry.png",
        ];

        $query = DB::table('table_categories');

        $carbon = new Carbon;

        $current = $carbon::create(2023,1,5);
        
        for($i = 0; $i < 7; $i++){
            if($i < 5){
                $date = $current;
            }
            else{
                $date = $carbon::create(2023,5,1);
            }
            $query->insert([
                "name" => $list_name[$i],
                "name_vi" => $list_name_vi[$i],
                "slug" => $list_slug[$i],
                "photo" => $list_category[$i],
                "status" => 1,
                "created_at" => $date,
                "updated_at" => $date,
            ]);
        }
    }
}
