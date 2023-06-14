<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        $current = $carbon::create(2023,1,5);
        // Tin tức
        $tintuc1 = [
            "name" => "Top 18+ nước hoa thơm lâu cho nam cao cấp lưu hương suốt cả ngày dài",
            "slug" => "top-18-nuoc-hoa-thom-lau-cho-nam-cao-cap-luu-huong-suot-ca-ngay-dai",
            "desc" => "Nước hoa - “vũ khí tối thượng” để chàng trở nên hấp dẫn hơn trong mắt phái đẹp.",
            "photo" => "thumbnails/post/tintuc1_6475fa078e570.webp",
            "status" => 1,
            "type"=>"tin-tuc",
            "created_at" => $current,
            "updated_at" => $current,
        ];
        $tintuc2 = [
            "name" => "Bí kíp tạo dáng chụp ảnh nam đẹp ngầu như mẫu nam Hàn Quốc",
            "slug" => "bi-kip-tao-dang-chup-anh-nam-dep-ngau-nhu-mau-nam-han-quoc",
            "desc" => "Chắc rằng không ít chàng trai cảm thấy việc chụp hình là vô cùng khó khăn",
            "photo" => "thumbnails/post/tao-dang-chup-anh-nam-4_11_6475fa20115a7.webp",
            "status" => 1,
            "type"=>"tin-tuc",
            "created_at" => $current,
            "updated_at" => $current,
        ];
        $tintuc3 = [
            "name" => "Đặt biệt danh cho người yêu cực dễ thương, tình cảm và độc đáo nhất 2023",
            "slug" => "dat-biet-danh-cho-nguoi-yeu-cuc-de-thuong-tinh-cam-va-doc-dao-nhat-2023",
            "desc" => "Biệt danh là gì? Biệt danh được hiểu đơn giản",
            "photo" => "thumbnails/post/tintuc2_6475fa5213418.webp",
            "status" => 1,
            "type"=>"tin-tuc",
            "created_at" => $current,
            "updated_at" => $current,
        ];

        //Dịch vụ
        $dichvu1 = [
            "name" => "Dịch vụ hài lòng 100%",
            "slug" => "dich-vu-hai-long-100",
            "desc" =>"",
            "photo" => "thumbnails/post/dichvu_6475fab1816a3.webp",
            "status" => 1,
            "type"=>"dich-vu",
            "created_at" => $current,
            "updated_at" => $current,
        ];
        $dichvu2 = [
            "name" => "Dịch vụ mua hàng sỉ",
            "slug" => "dich-vu-mua-hang-si",
            "desc" =>"",
            "photo" => "thumbnails/post/dichvu1_6475fae25c534.webp",
            "status" => 1,
            "type"=>"dich-vu",
            "created_at" => $current,
            "updated_at" => $current,
        ];

        // Tiêu chí
        $tieuchi1 = [
            "name" => "MIỄN PHÍ VẬN CHUYỂN CHO ĐƠN HÀNG TRÊN 200K",
            "slug" => "mien-phi-van-chuyen-cho-don-hang-tren-200k",
            "desc" =>"",
            "photo" => "thumbnails/post/tc1_6475fe66bc82d.png",
            "status" => 1,
            "type"=>"tieu-chi",
            "created_at" => $current,
            "updated_at" => $current,
        ];
        $tieuchi2 = [
            "name" => "60 NGÀY ĐỔI TRẢ VÌ BẤT KÌ LÝ DO GÌ",
            "slug" => "60-ngay-doi-tra-vi-bat-ki-ly-do-gi",
            "desc" =>"",
            "photo" => "thumbnails/post/tc2_6475fe6ff1198.png",
            "status" => 1,
            "type"=>"tieu-chi",
            "created_at" => $current,
            "updated_at" => $current,
        ];
        $tieuchi3= [
            "name" => "ĐẾN TẬN NƠI NHẬN HÀNG TRẢ, HOÀN TIỀN TRONG 24H",
            "slug" => "den-tan-noi-nhan-hang-tra-hoan-tien-trong-24h",
            "desc" =>"",
            "photo" => "thumbnails/post/tc3_6475fe94ad4ed.png",
            "status" => 1,
            "type"=>"tieu-chi",
            "created_at" => $current,
            "updated_at" => $current,
        ];
        $tieuchi4= [
            "name" => "TỰ HÀO SẢN XUẤT TẠI VIỆT NAM",
            "slug" => "tu-hao-san-xuat-tai-viet-nam",
            "desc" =>"",
            "photo" => "thumbnails/post/tc4_6475fe9b9f3f7.png",
            "status" => 1,
            "type"=>"tieu-chi",
            "created_at" => $current,
            "updated_at" => $current,
        ];

        $data = [
            $tintuc1,
            $tintuc2,
            $tintuc3,
            $dichvu1,
            $dichvu2,
            $tieuchi1,
            $tieuchi2,
            $tieuchi3,
            $tieuchi4
        ];
        DB::table('table_posts')->insert($data);

    }
}
