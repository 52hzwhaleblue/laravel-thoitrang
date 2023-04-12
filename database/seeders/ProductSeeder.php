<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\TableProduct;
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

      $faker = Faker::create();

      $product_1 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun ba lỗ nam sành điệu đẹp",
        "slug" => "ao-thun-ba-lo",
        "regular_price" => 99000,
        "sale_price" => null,
        "discount" => 0,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["232746","95a5a6"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
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
        "sale_price" => 27000,
        "discount" => 5,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
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
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["ffffff","e74c3c","27ae60"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_4= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo polo nam thời trang phù hợp phong cách trẻ trung Kira",
        "slug" => "ao-polo",
        "regular_price" => 220000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["ffffff","e74c3c","27ae60"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_5= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun đẹp chất vải nhẹ mát mẻ vào",
        "slug" => "ao-thun",
        "regular_price" => 99000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["495934","000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_6= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun tay dài đẹp chất vải nhẹ lịch lãm",
        "slug" => "ao-thun",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["M","L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["ffffff","657689"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_7= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ đeo tay nam EFR-527L-1AV",
        "slug" => "dong-ho",
        "regular_price" => 320000,
        "sale_price" => 12800,
        "discount" => 4,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_8= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ đeo tay nữ SHE-4538GL-7A",
        "slug" => "dong-ho",
        "regular_price" => 180000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["4834d4"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_9= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính Buffterfly gọng kim loại",
        "slug" => "mat-kinh",
        "regular_price" => 330000,
        "sale_price" => 16500,
        "discount" => 5,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["b88491","b7a1c6"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_10= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính nữ chống đèn loá sành điệu thời trang JOMO EYEWEAR",
        "slug" => "mat-kinh",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_11= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Mắt kính round classic đẹp sành điệu",
        "slug" => "mat-kinh",
        "regular_price" => 330000,
        "sale_price" => 16500,
        "discount" => 5,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["d9b4ac","8b81a2"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_12= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách lớn satchel 2 ngăn",
        "slug" => "tui-xach",
        "regular_price" => 270000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["000000","e4cfc4","e5e1dc"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_13= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách da đeo chéo",
        "slug" => "tui-xach",
        "regular_price" => 160000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["b48d82"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_14= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách văn phòng đựng laptop",
        "slug" => "tui-xach",
        "regular_price" => 290000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_15= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách NAHA nữ đẹp",
        "slug" => "tui-xach",
        "regular_price" => 310000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["b6ccb6","dcccbf"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_16= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Guốc cao nữ",
        "slug" => "guoc-cao",
        "regular_price" => 195000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [36,37],
          "origin" => "Việt Nam",
          "colors" => ["ffffff","000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_17= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo Hoodie drew cực đẹp dành cho giới trẻ",
        "slug" => "ao",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL"],
          "origin" => "Việt Nam",
          "colors" => ["914900","000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_18= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Giày IceBreaker",
        "slug" => "giay",
        "regular_price" => 450000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [36,37,38,39,40],
          "origin" => "Việt Nam",
          "colors" => ["d4e0e8","edd3e1","000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_19= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey",
        "slug" => "kinh",
        "regular_price" => 185000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["ffffff"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 6,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_20= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Nike_Air_Jordan_1_High_OG_Metallic",
        "slug" => "giay-the-thao",
        "regular_price" => 560000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [36,37,38,39,40],
          "origin" => "Việt Nam",
          "colors" => ["5a6c89","88898b"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_21= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần baggy nam nữ trẻ trung thời trang",
        "slug" => "quan",
        "regular_price" => 145000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
          "colors" => ["b7a078"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_22= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần jogger thể thao trơn basic",
        "slug" => "quan",
        "regular_price" => 168000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
          "colors" => ["9b9fa3","232c47"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_23= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần kaki nam PIGOFASHION",
        "slug" => "quan",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
          "colors" => ["4e585b","60654d"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_24= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần short thể thao nam co giãn thấm hút PIGOFASHION",
        "slug" => "quan",
        "regular_price" => 230000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
          "colors" => ["000000","ffffff"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_25 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi văn phòng cho nữ",
        "slug" => "ao-so-mi",
        "regular_price" => 250000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["M","X","L"],
          "origin" => "Việt Nam",
          "colors" => ["cad4f1","c4bfd5","ffffff"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_26 = [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo sơ mi văn phòng cho nam",
        "slug" => "ao-so-mi",
        "regular_price" => 250000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => ["X","L","XL","XXL"],
          "origin" => "Việt Nam",
          "colors" => ["000000","b7c0bd","ab8c80"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_27= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồng hồ casio bền chống nước",
        "slug" => "dong-ho",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["000000"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
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
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["d2b39c"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 5,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_29= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Halio Canvas",
        "slug" => "tui-xach",
        "regular_price" => 86000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["ffffff"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => now(),
        "updated_at" => now(),
      ];

      $product_30= [
        "code" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Tote - Okame Hoa",
        "slug" => "tui-xach",
        "regular_price" => 90000,
        "sale_price" => null,
        "discount" => null,
        "stock" => random_int(10,60),
        "desc" => $faker->paragraph(random_int(3,7)),
        "properties" => json_encode([
          "sizes" => [],
          "origin" => "Việt Nam",
          "colors" => ["ffffff"],
        ]),
        "photo" => "20230307-product1.jpg",
        "photo1" => "20230307-product11.jpg",
        "category_id" => 3,
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
      ];

       DB::table('table_products')->insert($productsData);
    }
}
