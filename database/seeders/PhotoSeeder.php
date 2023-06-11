<?php

namespace Database\Seeders;

use App\Models\TablePhoto;
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
        $photoEloquent = new TablePhoto();
        // Slideshow
        $slideshow = [
            "thumbnails/photo/slide-9533_6475f709cad12.png",
            "thumbnails/photo/slide-9533_6475f709cad12.png",
            "thumbnails/photo/slide-9533_6475f709cad12.png",
        ];
        foreach($slideshow as $index => $item){
            $photoEloquent->create([
                "photo" => $item,
                "type" => 'slideshow',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }
        // Giới thiệu Slide
        $gioithieuSlide = [
            "thumbnails/photo/gioithieu1_6475f83e868e6.png",
            "thumbnails/photo/gioithieu2_6475f84767115.png",
        ];
        foreach($gioithieuSlide as $index => $item){
            $photoEloquent->create([
                "photo" => $item,
                "type" => 'gioithieu-slide',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }

        // Thư viện ảnh (Album)
        $album = [
            "thumbnails/photo/album0_647606b32a813.jpg",
            "thumbnails/photo/album0_647606bf5392e.jpg",
            "thumbnails/photo/album_647606cc362dd.png",
            "thumbnails/photo/album0_647606d8144cb.jpg",
            "thumbnails/photo/album0_647606e02bf29.jpg"
        ];
        foreach($album as $index => $item){
            $photoEloquent->create([
                "photo" => $item,
                "type" => 'thu-vien-anh',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }

        // Logo
        $photoEloquent->create([
            "name" => 'logo',
            "type" => 'logo',
            "photo" => 'thumbnails/photo/logo-8163_6455057ae4506.png',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        // BannerQC
        $photoEloquent->create([
            "name" => 'Banner Quảng Cáo',
            "type" => 'banner-quangcao',
            "photo" => 'thumbnails/photo/bannerQC3_647608decfe17.jpg',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

    }
}
