<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create('vi_VN');
      $carbon = new Carbon;
      $current = $carbon::create(2023,1,5);

      $product_1 = [
        "SKU" =>  "PROF". Str::random(10).date('YmdHis'),
        "name" => "Áo thun nam ba lỗ sành điệu đẹp",
        "slug" => "ao-thun-nam-ba-lo-sanh-dieu-dep",
        "regular_price" => 99000, 
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_2 = [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo khoác da lót dù cao cấp ADN10",
        "slug" => "ao-khoac-da-lot-du-cao-cap-adn10",
        "regular_price" => 300000,
        "sale_price" => 200000,
        "discount" => 67,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_3= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo polo nam thời trang phù hợp phong cách trẻ trung Kira",
        "slug" => "ao-polo-nam-thoi-trang-phu-hop-phong-cach-tre-trung-kira",
        "regular_price" => 200000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_4= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam đẹp chất vải nhẹ mát mẻ vào hè",
        "slug" => "ao-thun-nam-dep-chat-vai-nhe-mat-me-vao-he",
        "regular_price" => 99000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",

        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_5= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam tay dài đẹp chất vải nhẹ lịch lãm",
        "slug" => "ao-thun-nam-tay-dai-dep-chat-vai-nhe-lich-lam",
        "regular_price" => 150000,
        "sale_price" => 135000,
        "discount" => 10,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_6= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ đeo tay nam EFR-526L-1AV",
        "slug" => "dong-ho-deo-tay-nam-efr-526l-1av",
        "regular_price" => 300000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_7= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ đeo tay nữ SHE-4538GL-6A",
        "slug" => "dong-ho-nu-SHE-4538GL-6A",
        "regular_price" => 300000,
        "sale_price" => 150000,
        "discount" => 50,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_8= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính Buffterfly classic gọng kim loại",
        "slug" => "mat-kinh-buffterfly-classic-gong-kim-loai",
        "regular_price" => 150000,
        "sale_price" => 145000,
        "discount" => 3,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_9= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính nữ chống đèn loá sành điệu thời trang JOMO EYEWEAR",
        "slug" => "mat-kinh-nu-chong-den-loa-sanh-dieu-thoi-trang-jomo-eyewear",
        "regular_price" => 120000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_10= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính round classic đẹp sành điệu",
        "slug" => "mat-kinh-round-classic-dep-sanh-dieu",
        "regular_price" => 21000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_11= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách lớn satchel 2 ngăn cho nam nữ văn phòng",
        "slug" => "tui-xach-lon-satchel-2-ngan-cho-nam-nu-van-phong",
        "regular_price" => 350000,
        "sale_price" => 270000,
        "discount" => 23,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_12= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách da đeo chéo nam thời trang phong cách",
        "slug" => "tui-xach-da-deo-cheo-nam-thoi-trang-phong-cach",
        "regular_price" => 176000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_13= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách văn phòng đựng laptop cho cả nam lẫn nữ",
        "slug" => "tui-xach-van-phong-dung-laptop-cho-ca-nam-lan-nu",
        "regular_price" => 290000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_14= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách NAHA nữ đẹp",
        "slug" => "tui-xach-naha-nu-dep",
        "regular_price" => 145000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_15= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Guốc cao nữ",
        "slug" => "guoc-cao-nu",
        "regular_price" => 410000,
        "sale_price" => 380000,
        "discount" => 10,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_16= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo Hoodie drew cực đẹp dành cho giới trẻ nam nữ",
        "slug" => "ao-hooide-drew-cuc-dep-danh-cho-gioi-tre-nam-nu",
        "regular_price" => 270000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_17= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày IceBreaker nữ",
        "slug" => "giay-icebeaker-nu",
        "regular_price" => 500000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_18= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey nam nữ",
        "slug" => "kinh-mat-thoi-trang-chong-loa-jomo-eyewear-bailey-nam-nu",
        "regular_price" => 125000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_19= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Nike_Air_Jordan_1_High_OG_Metallic nam nữ",
        "slug" => "nike-air-jordan-1-high-og-metallic-nam-nu",
        "regular_price" => 750000,
        "sale_price" => 725000,
        "discount" => 10,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_20= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần baggy nam nữ trẻ trung thời trang",
        "slug" => "quan",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
        
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_21= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần jogger nam thể thao trơn basic",
        "slug" => "quan-jogger-nam-the-thao-tron-basic",
        "regular_price" => 105000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_22= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần kaki nam PIGOFASHION",
        "slug" => "quan-kaki-nam-pigofashion",
        "regular_price" => 80000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_23= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần short thể thao nam co giãn thấm hút PIGOFASHION",
        "slug" => "quan-short-the-thao-nam-co-gian-tham-hut-PIGOFASHION",
        "regular_price" => 164000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_24 = [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi văn phòng cho nữ",
        "slug" => "ao-so-mi-van-phong-cho-nu",
        "regular_price" => 177000,
        "sale_price" => 143000,
        "discount" => 8,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_25 = [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi văn phòng cho nam",
        "slug" => "ao-so-mi-van-[hong-cho-nam",
        "regular_price" => 180000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
    
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_26 = [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi tay dài văn phòng cho nam",
        "slug" => "ao-so-mi-tay-dai-van-phong-cho-nam",
        "regular_price" => 300000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_27= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ casio bền chống nước nam nữ",
        "slug" => "dong-ho-casio-ben-chong-nuoc-nam-nu",
        "regular_price" => 350000,
        "sale_price" => 250000,
        "discount" => 29,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_28= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ nữ Marble Florals",
        "slug" => "dong-ho-nu-marble-florals",
        "regular_price" => 170000,
        "sale_price" =>null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_29= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Halio Canvas nữ",
        "slug" => "tui-halio-canvas-nu",
        "regular_price" => 99000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
     
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_30= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Tote - Okame Hoa thời trang nữ",
        "slug" => "tui-tote-okame-hoa-thoi-trang-nu",
        "regular_price" => 99000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $product_31= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày Sandal Nam MWC - 7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic",
        "slug" => "giay-sandal-nam-mwc-7066-giay-sandal-nam-quai-cheo-kieu-dang-basic",
        "regular_price" => 300000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" =>$carbon::create(2023,5,1),
        "updated_at" =>$carbon::create(2023,5,1),
      ];

      $product_32= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày Sandal Nam Hiệu Vento",
        "slug" => "giay-sandal-nam-hieu-vento",
        "regular_price" => 330000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" =>$carbon::create(2023,5,1),
        "updated_at" =>$carbon::create(2023,5,1),
      ];

      $product_33= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mũ Lưỡi Trai Đen Trơn Classic Khóa Đồng Cao Cấp Cho Nam và Nữ",
        "slug" => "mu-luoi-trai-den-tron-classic-khoa-dong-cao-cap-cho-nam-va-nu",
        "regular_price" => 135000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
       
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" =>$carbon::create(2023,5,1),
        "updated_at" =>$carbon::create(2023,5,1),
      ];

      $product_34= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Nón Bucket, Mũ Vành Tròn Nam Nữ 2 Mặt Trơn Classic Cao Cấp",
        "slug" => "non-bucket-mu-vanh-tron-nam-nu-2-mat-tron-classic-cao-cap",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "desc" => "Sản phẩm đẹp, thời trang phong cách năm 2023. Là sự lựa chọn hoàn hảo của giới trẻ",
      
      
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" =>$carbon::create(2023,5,1),
        "updated_at" =>$carbon::create(2023,5,1),
      ];

      $products = [
        $product_1,
        $product_2,
        $product_3,
        $product_4,
        $product_5,
        $product_6,
        $product_7,
        $product_8,
        $product_9,
        $product_10,
        $product_11,
        $product_12,
        $product_13,
        $product_14,
        $product_15,
        $product_16,
        $product_17,
        $product_18,
        $product_19,
        $product_20,
        $product_21,
        $product_22,
        $product_23,
        $product_24,
        $product_25,
        $product_26,
        $product_27,
        $product_28,
        $product_29,
        $product_30,
        $product_31,
        $product_32,
        $product_33,
        $product_34,
      ];

       DB::table('table_products')->insert($products);
    }
}
