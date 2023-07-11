<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
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

      $ao_1 = [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam ba lỗ sành điệu đẹp",
        "slug" => "ao-thun-nam-ba-lo-sanh-dieu-dep",
        "regular_price" => 300000,
        "sale_price" => 150000,
        "discount" => 50,
        "desc" => $faker->paragraph(random_int(3,6)),
        "photo" => "thumbnails/products/ao1_s.jpg",
        "photo1" => "thumbnails/products/ao1_t.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $ao_2 = [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo khoác da lót dù cao cấp ADN10",
        "slug" => "ao-khoac-da-lot-du-cao-cap-adn10",
        "regular_price" => 300000,
        "sale_price" => 200000,
        "discount" => 67,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/ao2_s.jpg",
          "photo1" => "thumbnails/products/ao2_t.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $ao_3= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo polo nam thời trang phù hợp phong cách trẻ trung Kira",
        "slug" => "ao-polo-nam-thoi-trang-phu-hop-phong-cach-tre-trung-kira",
        "regular_price" => 200000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/ao3_s.jpg",
          "photo1" => "thumbnails/products/ao3_t.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $ao_4= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam đẹp chất vải nhẹ mát mẻ vào hè",
        "slug" => "ao-thun-nam-dep-chat-vai-nhe-mat-me-vao-he",
        "regular_price" => 99000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/ao4_s.jpg",
          "photo1" => "thumbnails/products/ao4_t.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $ao_5= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam tay dài đẹp chất vải nhẹ lịch lãm",
        "slug" => "ao-thun-nam-tay-dai-dep-chat-vai-nhe-lich-lam",
        "regular_price" => 150000,
        "sale_price" => 135000,
        "discount" => 10,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/ao5_s.jpg",
          "photo1" => "thumbnails/products/ao5_t.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $ao_6= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Áo thun nam thời trang",
        "slug" => "ao-thun-nam-thoi-trang",
        "regular_price" => 300000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/ao6_s.jpg",
          "photo1" => "thumbnails/products/ao6_t.jpg",
        "category_id" => 1,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      // Quần
      $quan_1= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần mùa hè",
        "slug" => "quan-mua-he",
        "regular_price" => 300000,
        "sale_price" => 150000,
        "discount" => 50,
        "desc" => $faker->paragraph(random_int(3,6)),
        "photo" => "thumbnails/products/quan1_t.jpg",
        "photo1" => "thumbnails/products/quan1_s.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $quan_2= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần short nam đi biển",
        "slug" => "quan-short-nam-di-bien",
        "regular_price" => 150000,
        "sale_price" => 145000,
        "discount" => 3,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/quan2_t.jpg",
          "photo1" => "thumbnails/products/quan2_s.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $quan_3= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần short nam tể thao",
        "slug" => "quan-short-nam-the-thao",
        "regular_price" => 120000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/quan3_t.jpg",
          "photo1" => "thumbnails/products/quan3_s.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $quan_4= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần short tối giản",
        "slug" => "quan-short-toi-gian",
        "regular_price" => 21000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/quan4_t.jpg",
          "photo1" => "thumbnails/products/quan4_s.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $quan_5= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần nam mặc hằng ngày",
        "slug" => "quan-nam-mac-hang-ngay",
        "regular_price" => 350000,
        "sale_price" => 270000,
        "discount" => 23,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/quan5_t.jpg",
          "photo1" => "thumbnails/products/quan5_s.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $quan_6= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Quần thoáng khí",
        "slug" => "quan-thoang-khi",
        "regular_price" => 176000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/quan6_t.jpg",
          "photo1" => "thumbnails/products/quan6_s.jpg",
        "category_id" => 2,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];
      // Đồ bộ
      $dobo_1= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồ bộ nam mát mẻ mùa hè",
        "slug" => "do-bo-nam-mat-me-mua-he",
        "regular_price" => 290000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
        "photo" => "thumbnails/products/dobo1_t.jpg",
        "photo1" => "thumbnails/products/dobo1_s.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $dobo_2= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồ bộ thể thao",
        "slug" => "do-bo-the-thao",
        "regular_price" => 145000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/dobo2_t.jpg",
          "photo1" => "thumbnails/products/dobo2_s.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $dobo_3= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồ bộ năng động",
        "slug" => "do-bo-nang-dong",
        "regular_price" => 410000,
        "sale_price" => 380000,
        "discount" => 10,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/dobo3_t.jpg",
          "photo1" => "thumbnails/products/dobo3_s.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $dobo_4= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Đồ bộ hoa anh đào",
        "slug" => "do-bo-hoa-anh-dao",
        "regular_price" => 270000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/dobo4_t.jpg",
          "photo1" => "thumbnails/products/dobo4_s.jpg",
        "category_id" => 3,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      // Túi xách
      $tuixach_1= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi xách cổ điển",
        "slug" => "tui-xach-co-dien",
        "regular_price" => 750000,
        "sale_price" => 725000,
        "discount" => 10,
        "desc" => $faker->paragraph(random_int(3,6)),
        "photo" => "thumbnails/products/tuixach1_t.jpg",
        "photo1" => "thumbnails/products/tuixach1_s.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $tuixach_2= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi đeo chéo classic",
        "slug" => "tui-deo-cheo-classic",
        "regular_price" => 150000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/tuixach2_t.jpg",
          "photo1" => "thumbnails/products/tuixach2_s.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $tuixach_3= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi đeo chéo messenger",
        "slug" => "tui-deo-cheo-messenger",
        "regular_price" => 105000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/tuixach3_t.jpg",
          "photo1" => "thumbnails/products/tuixach3_s.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

      $tuixach_4= [
        "SKU" =>  "PROF". Str::random(10) . date('YmdHis'),
        "name" => "Túi Tote V1 - Signature",
        "slug" => "tui-tote-v1-signature",
        "regular_price" => 80000,
        "sale_price" => null,
        "discount" => null,
        "desc" => $faker->paragraph(random_int(3,6)),
          "photo" => "thumbnails/products/tuixach4_t.jpg",
          "photo1" => "thumbnails/products/tuixach4_s.jpg",
        "category_id" => 4,
        "view" => random_int(20,500),
        "status" => 1,
        "created_at" => $current,
        "updated_at" => $current,
      ];

        // Tạo thư mục categories trong public/storage/thumbnails
        $thumbnail_path = 'thumbnails/products';
        Storage::disk('public')->makeDirectory($thumbnail_path);

        $products = [
            $ao_1,
            $ao_2,
            $ao_3,
            $ao_4,
            $ao_5,
            $ao_6,
            $quan_1,
            $quan_2,
            $quan_3,
            $quan_4,
            $quan_5,
            $quan_6,
            $dobo_1,
            $dobo_2,
            $dobo_3,
            $dobo_4,
            $tuixach_1,
            $tuixach_2,
            $tuixach_3,
            $tuixach_4,
        ];

       DB::table('table_products')->insert($products);
    }
}
