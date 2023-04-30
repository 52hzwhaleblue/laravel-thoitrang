<?php

namespace Database\Seeders;

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

      $product_1 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam ba lỗ sành điệu đẹp",
        "slug" => "ao-thun",
        "regular_price" => 99000,
        "sale_price" => 10000,
        "discount" => 0,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_2 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo khoác da lót dù cao cấp ADN10",
        "slug" => "ao-khoac-da",
        "regular_price" => 540000,
        "sale_price" => 26000,
        "discount" => 5,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["L","XL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_3= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo polo nam thời trang phù hợp phong cách trẻ trung Kira",
        "slug" => "ao-polo",
        "regular_price" => 220000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_4= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam đẹp chất vải nhẹ mát mẻ vào",
        "slug" => "ao-thun",
        "regular_price" => 99000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_5= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam tay dài đẹp chất vải nhẹ lịch lãm",
        "slug" => "ao-thun",
        "regular_price" => 150000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_6= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ đeo tay nam EFR-526L-1AV",
        "slug" => "dong-ho",
        "regular_price" => 320000,
        "sale_price" => 12800,
        "discount" => 4,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_7= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ đeo tay nữ SHE-4538GL-6A",
        "slug" => "dong-ho",
        "regular_price" => 180000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_8= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính Buffterfly classic gọng kim loại",
        "slug" => "mat-kinh",
        "regular_price" => 330000,
        "sale_price" => 15500,
        "discount" => 5,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_9= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính nữ chống đèn loá sành điệu thời trang JOMO EYEWEAR",
        "slug" => "mat-kinh",
        "regular_price" => 150000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_10= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính round classic đẹp sành điệu",
        "slug" => "mat-kinh",
        "regular_price" => 330000,
        "sale_price" => 15500,
        "discount" => 5,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["d9b4ac","8b81a2"],
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_11= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách lớn satchel 2 ngăn cho nam nữ văn phòng",
        "slug" => "tui-xach",
        "regular_price" => 260000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_12= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách da đeo chéo nam thời trang phong cách",
        "slug" => "tui-xach",
        "regular_price" => 150000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_13= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách văn phòng đựng laptop cho cả nam lẫn nữ",
        "slug" => "tui-xach",
        "regular_price" => 290000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_14= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách NAHA nữ đẹp",
        "slug" => "tui-xach",
        "regular_price" => 310000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_15= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Guốc cao nữ",
        "slug" => "guoc-cao",
        "regular_price" => 195000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [35,36],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_16= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo Hoodie drew cực đẹp dành cho giới trẻ nam nữ",
        "slug" => "ao",
        "regular_price" => 150000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_17= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày IceBreaker nữ",
        "slug" => "giay",
        "regular_price" => 450000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [35,36,38,39,40],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_18= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey nam nữ",
        "slug" => "kinh",
        "regular_price" => 185000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_19= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Nike_Air_Jordan_1_High_OG_Metallic nam nữ",
        "slug" => "giay-the-thao",
        "regular_price" => 550000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [35,36,38,39,40],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_20= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần baggy nam nữ trẻ trung thời trang",
        "slug" => "quan",
        "regular_price" => 145000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_21= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần jogger nam thể thao trơn basic",
        "slug" => "quan",
        "regular_price" => 158000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_22= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần kaki nam PIGOFASHION",
        "slug" => "quan",
        "regular_price" => 150000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_23= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần short thể thao nam co giãn thấm hút PIGOFASHION",
        "slug" => "quan",
        "regular_price" => 230000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_24 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi văn phòng cho nữ",
        "slug" => "ao-so-mi",
        "regular_price" => 250000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["M","X","L"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_25 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi văn phòng cho nam",
        "slug" => "ao-so-mi",
        "regular_price" => 250000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_26 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi tay dài văn phòng cho nam",
        "slug" => "ao-so-mi",
        "regular_price" => 3300000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
          "colors" => ["000000","74b9ff"],
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_27= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ casio bền chống nước nam nữ",
        "slug" => "dong-ho",
        "regular_price" => 150000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_28= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ nữ Marble Florals",
        "slug" => "dong-ho",
        "regular_price" => 245000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_29= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Halio Canvas nữ",
        "slug" => "tui-xach",
        "regular_price" => 85000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_30= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Tote - Okame Hoa thời trang nữ",
        "slug" => "tui-xach",
        "regular_price" => 90000,
        "sale_price" => 10000,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];


      $product_31= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày Sandal Nam MWC - 7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic",
        "slug" => "giay",
        "regular_price" => 320000,
        "sale_price" => 16000,
        "discount" => 5,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [39,40,41,42,43,44],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_32= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày Sandal Nam Hiệu Vento",
        "slug" => "giay",
        "regular_price" => 420000,
        "sale_price" => 21000,
        "discount" => 5,
        "desc" => $faker->paragraph(random_int(3,6)),
        "properties" => json_encode([
          "sizes" => [38,39,40,41,42],
          "origin" => "Việt Nam",
        ]),
        "photo" => "thumbnails/products/aothun_644d318fad195.jpg",
        "photo1" => "thumbnails/products/aothun1_644d318fc86f9.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $productsData = [
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
      ];

       DB::table('table_products')->insert($productsData);
    }
}
