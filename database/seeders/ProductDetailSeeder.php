<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_product= [
            "thumbnails/products/ao_ba_lo_do.jpg" => 6,
            "thumbnails/products/ao_ba_lo_xanh.jpg"=> 6,
            "thumbnails/products/ao_cotton_kid.jpg"=> 5,
            "thumbnails/products/ao_phong_unisex_black_white_1.jpg"=> 4,
            "thumbnails/products/ao_phong_unisex_black_white_2.jpg"=> 4,
            "thumbnails/products/ao-polo-nam-aristino-den.png"=> 1,
            "thumbnails/products/ao-polo-nam-Aristino-xam.jpg"=> 1,
            "thumbnails/products/ao-polo-nam-Aristino-xanh.jpg"=> 1,
            "thumbnails/products/dam_han_quoc_den_nau-nhat.jpg"=> 9,
            "thumbnails/products/guoc_banh_mi_nu_1.jpg"=> 2,
            "thumbnails/products/guoc_banh_mi_nu_2.jpg"=> 2,
            "thumbnails/products/guoc_cao_no_black.png"=> 3,
            "thumbnails/products/guoc_cao_no_white.jpg"=> 3,
            "thumbnails/products/hoodie_den.jpg"=>7,
            "thumbnails/products/hoodie_white.jpg"=>7,
            "thumbnails/products/hoodie_xanh.jpg"=>7,
            "thumbnails/products/jean_nam_xanh_1.jpg"=> 10,
            "thumbnails/products/jean_nam_xanh.jpg"=> 10,
            "thumbnails/products/Vay_de_tiec_nau.jpg"=> 8,
            "thumbnails/products/vay_di_tiec_den.jpg"=> 8,
        ];

        foreach ($list_product as $value => $key) {
            DB::table('table_product_details')->insert([
                "product_id" =>  $key,
                "photo" => $value,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
