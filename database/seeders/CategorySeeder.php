<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TableCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            "Tops","Bottoms","Two Pieces","Bags","Accessories","Oxfords","Bitis Hunter","Watch","Wallet","Underwear"
        ];

        $list_name_vi = [
            "Áo","Quần","Đồ bộ","Túi xách", "Phụ kiện","Giày Oxfords","Bitis Hunter","Đồng Hồ","Ví da","Quần mặc trong"
        ];

        $list_slug= [
            "ao",
            "quan",
            "do-bo",
            "tui-xach",
            "phu-kien",
            "giay-oxfords",
            "bitis-hunter",
            "dong-ho",
            "vi-da",
            "quan-mac-trong",
        ];

        $list_category = [
            "thumbnails/categories/cap1_ao.jpg",
            "thumbnails/categories/cap1_quan.jpg",
            "thumbnails/categories/cap1_both.jpg",
            "thumbnails/categories/cap1_tuixach.jpg",
            "thumbnails/categories/cap1_phukien.jpg",
            "thumbnails/categories/cap1_oxfords.jpg",
            "thumbnails/categories/cap1_bitis.jpg",
            "thumbnails/categories/cap1_dongho.jpg",
            "thumbnails/categories/cap1_vida.jpg",
            "thumbnails/categories/cap1_quanmactrong.jpg",
        ];
        // Tạo thư mục categories trong public/storage/thumbnails
        $thumbnail_path = 'thumbnails/categories';
        Storage::disk('public')->makeDirectory($thumbnail_path);

        $query = DB::table('table_categories');

        $carbon = new Carbon;

        $current = $carbon::create(2023,1,5);

        for($i = 0; $i < 10; $i++){
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
