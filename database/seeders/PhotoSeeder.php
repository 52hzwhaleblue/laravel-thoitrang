<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listPhoto = [
            "thumbnails/slider/slider_3_63fd7e70ae1d6.jpg",
            "thumbnails/slider/slider_63fd7d37aa353.jpg",
            "thumbnails/slider/slider_63fd805a35abc.jpg",
        ];

        foreach($listPhoto as $index => $item){
            DB::table('table_photos')->insert([
                "photo" => $item,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
