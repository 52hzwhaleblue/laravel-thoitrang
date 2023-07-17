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
            "thumbnails/photo/slide1.jpg",
            "thumbnails/photo/slide2.jpg",
            "thumbnails/photo/slide3.jpg",
            "thumbnails/photo/slide4.jpg",
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
            "thumbnails/photo/gioithieu1.jpg",
            "thumbnails/photo/gioithieu2.jpg",
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
            "thumbnails/photo/album1.jpg",
            "thumbnails/photo/album2.jpg",
            "thumbnails/photo/album3.jpg",
            "thumbnails/photo/album4.jpg",
            "thumbnails/photo/album5.jpg"
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
