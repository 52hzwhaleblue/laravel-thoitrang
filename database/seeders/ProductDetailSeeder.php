<?php

namespace Database\Seeders;

use App\Models\TableProductDetail;
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
        $imagesProduct= [
            ["id" => 1, "color" => "#232645", "size" => "M",'photo'=> 'ao_ba_lo_blue_bold'],
            ["id" => 1, "color" => "#232645", "size" => "L",'photo'=> 'ao_ba_lo_blue_bold'],
            ["id" => 1, "color" => "#232645", "size" => "XL",'photo'=> 'ao_ba_lo_blue_bold'],

            ["id" => 1, "color" => "#95a5a5", "size" => "L",'photo'=> 'ao_ba_lo_grey_bold'],
            ["id" => 1, "color" => "#95a5a5", "size" => "XL",'photo'=> 'ao_ba_lo_grey_bold'],

            ["id" => 2, "color" => "#000000", 'size' => "XL",'photo'=> 'ao_khoac_da_lot_du_cao_ cap_ADN10_den'],
            ["id" => 2, "color" => "#000000", 'size' => 'XXL','photo'=> 'ao_khoac_da_lot_du_cao_ cap_ADN10_den'],
            
            ["id" => 3, "color" => "#26ae50",'size' => "M",'photo'=> 'ao_polo_green'],
            ["id" => 3, "color" => "#26ae50",'size' => "L",'photo'=> 'ao_polo_green'],
            ["id" => 3, "color" => "#26ae50",'size' => "XL",'photo'=> 'ao_polo_green'],

            ["id" => 3, "color" => "#e64c3c",'size' => "M",'photo'=> 'ao_polo_red'],
            ["id" => 3, "color" => "#e64c3c",'size' => "L",'photo'=> 'ao_polo_red'],
            ["id" => 3, "color" => "#e64c3c",'size' => "XL",'photo'=> 'ao_polo_red'],

            ["id" => 3, "color" => "#ffffff",'size' => "M",'photo'=> 'ao_polo_trang'],
            ["id" => 3, "color" => "#ffffff",'size' => "L",'photo'=> 'ao_polo_trang'],
            ["id" => 3, "color" => "#ffffff",'size' => "XL",'photo'=> 'ao_polo_trang'],

            ["id" => 4, "color" => "#495934",'size' => 'L','photo'=> 'ao_thun_green' ],
            ["id" => 4, "color" => "#495934",'size' => 'XL','photo'=> 'ao_thun_green' ],

            ["id" => 4, "color" => "#000000",'size' => 'L' ,'photo'=> 'ao_thun_den'],
            ["id" => 4, "color" => "#000000",'size' => 'XL','photo'=> 'ao_thun_den' ],

            ["id" => 5, "color" => "#556578", 'size' => 'L','photo'=> 'ao_thun_tay_dai_657689'],
            ["id" => 5, "color" => "#556578", 'size' => 'XL','photo'=> 'ao_thun_tay_dai_657689'],

            ["id" => 5, "color" => "#ffffff", 'size' => 'L','photo'=> 'aothun_tay_dai_white'],

            ["id" => 6, "color" => "#000000",'photo'=> 'dong_ho_EFR-526L-1AV'],

            ["id" => 7, "color" => "#4834d4",'photo'=> 'dong_ho_nu_SHE-4538GL-7A'],

            ["id" => 8, "color" => "#b88491",'photo'=> 'glasses_butterfly _classic_Gọng_Kim_Loại_pink_b88491'],
            ["id" => 8, "color" => "#b7a1c6",'photo'=> 'glasses_butterfly _classic_Gọng_Kim_Loại_purple_b7a1c6'],

            ["id" => 9, "color" => "#000000",'photo'=> 'glasses_fashion_chong_den_cho_nu_JOMO EYEWEAR'],

            ["id" => 10, "color" => "#d9b4ac",'photo'=> 'glasses_round_classic_pink_light_d9b4ac'],
            ["id" => 10, "color" => "#8b81a2", 'photo' =>  "glasses_round_classic_purple8b81a2"],

            ["id" => 11, "color" => "#000000",'photo' => 'handbag_big_satchel_2_ngăn_000000'],
            ["id" => 11, "color" => "#e4cfc4",'photo' => 'handbag_big_satchel_2_ngăn_e4cfc4'],
            ["id" => 11, "color" => "#e5e1dc",'photo' => 'handbag_big_satchel_2_ngăn_e5e1dc'],

            ["id" => 12, "color" => "#b48d82",'photo' =>"handbag_di_choi_tiec_b48d82"],

            ["id" => 13, "color" => "#000000",'photo' => 'handbag_men_office_latop'],

            ["id" => 14, "color" => "#b6ccb6",'photo' =>'handbag_NAHA_b6ccb6'],
            ["id" => 14, "color" => "#dcccbf",'photo' => 'handbag_NAHA_dcccbf'],

            ["id" => 15, "color" => "#000000", 'photo' => 'hight_feel_black_000000'],
            ["id" => 15, "color" => "#ffffff", 'photo' => 'hight_feel_white'],

            ["id" => 16, "color" => "#000000", 'size' => 'L', 'photo' => 'hoodie_drew_black'],
            ["id" => 16, "color" => "#000000", 'size' => 'XL', 'photo' => 'hoodie_drew_black'],

            ["id" => 16, "color" => "#914900", 'size' => 'L', 'photo' => 'hoodie_drew_brown'],
            ["id" => 16, "color" => "#914900", 'size' => 'XL', 'photo' => 'hoodie_drew_brown'],

            ["id" => 17, "color" => "#d4e0e8", 'size' => 40, 'photo'=> 'icebreaker_d4e0e8'],
            ["id" => 17, "color" => "#d4e0e8", 'size' => 41, 'photo'=> 'icebreaker_d4e0e8'],
            ["id" => 17, "color" => "#d4e0e8", 'size' => 42, 'photo'=> 'icebreaker_d4e0e8'],
            ["id" => 17, "color" => "#d4e0e8", 'size' => 43, 'photo'=> 'icebreaker_d4e0e8'],
            ["id" => 17, "color" => "#d4e0e8", 'size' => 44, 'photo'=> 'icebreaker_d4e0e8'],

            ["id" => 17, "color" => "#edd3e1", 'size' => 39, 'photo'=> 'icebreaker_edd3e1'],
            ["id" => 17, "color" => "#edd3e1", 'size' => 40, 'photo'=> 'icebreaker_edd3e1'],
            ["id" => 17, "color" => "#edd3e1", 'size' => 41, 'photo'=> 'icebreaker_edd3e1'],
            ["id" => 17, "color" => "#edd3e1", 'size' => 42, 'photo'=> 'icebreaker_edd3e1'],
            ["id" => 17, "color" => "#edd3e1", 'size' => 43, 'photo'=> 'icebreaker_edd3e1'],

            ["id" => 17, "color" => "#000000", 'size' => 40, 'photo'=> 'icebreaker_black'],
            ["id" => 17, "color" => "#000000", 'size' => 41, 'photo'=> 'icebreaker_black'],
            ["id" => 17, "color" => "#000000", 'size' => 42, 'photo'=> 'icebreaker_black'],
            ["id" => 17, "color" => "#000000", 'size' => 43, 'photo'=> 'icebreaker_black'],

            ["id" => 18, "color" => "#ffffff",'photo'=> 'Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey Grey Smoke'],

            ["id" => 19, "color" => "#5a6c89", 'size' => 40,'photo'=> 'Nike_Air_Jordan_1_High_OG_Metallic_Blue_5a6c89'],
            ["id" => 19, "color" => "#5a6c89", 'size' => 41,'photo'=> 'Nike_Air_Jordan_1_High_OG_Metallic_Blue_5a6c89'],
            ["id" => 19, "color" => "#5a6c89", 'size' => 42,'photo'=> 'Nike_Air_Jordan_1_High_OG_Metallic_Blue_5a6c89'],

            ["id" => 19, "color" => "#88898b", 'size' => 40,'photo'=> 'Nike_Air_Jordan_1_High_OG_Metallic_grey_88898b'],
            ["id" => 19, "color" => "#88898b", 'size' => 41,'photo'=> 'Nike_Air_Jordan_1_High_OG_Metallic_grey_88898b'],
            ["id" => 19, "color" => "#88898b", 'size' => 42,'photo'=> 'Nike_Air_Jordan_1_High_OG_Metallic_grey_88898b'],

            ["id" => 20, "color" => "#b7a078",'size' => 31, 'photo'=> 'quan_baggy_nam_nu_b7a078'],
            ["id" => 20, "color" => "#b7a078",'size' => 32, 'photo'=> 'quan_baggy_nam_nu_b7a078'],
            ["id" => 20, "color" => "#b7a078",'size' => 33, 'photo'=> 'quan_baggy_nam_nu_b7a078'],

            ["id" => 21, "color" => "#9b9fa3", 'size' => 29, 'photo'=> 'quan_jogger_the_thao_tron_bacsic_9b9fa3'],
            ["id" => 21, "color" => "#9b9fa3", 'size' => 30, 'photo'=> 'quan_jogger_the_thao_tron_bacsic_9b9fa3'],
            ["id" => 21, "color" => "#9b9fa3", 'size' => 31, 'photo'=> 'quan_jogger_the_thao_tron_bacsic_9b9fa3'],
            ["id" => 21, "color" => "#9b9fa3", 'size' => 32, 'photo'=> 'quan_jogger_the_thao_tron_bacsic_9b9fa3'],
            ["id" => 21, "color" => "#9b9fa3", 'size' => 33, 'photo'=> 'quan_jogger_the_thao_tron_bacsic_9b9fa3'],

            ["id" => 21, "color" => "#232c47", 'size'=> 29,'photo'=> 'quan_jogger_the_thao_tron_bacsic_232c47'],
            ["id" => 21, "color" => "#232c47", 'size'=> 30,'photo'=> 'quan_jogger_the_thao_tron_bacsic_232c47'],
            ["id" => 21, "color" => "#232c47", 'size'=> 31,'photo'=> 'quan_jogger_the_thao_tron_bacsic_232c47'],
            ["id" => 21, "color" => "#232c47", 'size'=> 32,'photo'=> 'quan_jogger_the_thao_tron_bacsic_232c47'],
            ["id" => 21, "color" => "#232c47", 'size'=> 33,'photo'=> 'quan_jogger_the_thao_tron_bacsic_232c47'],

            ["id" => 22, "color" => "#4e585b", 'size'=> 30,'photo'=> 'quan_kaki_xam_dam_PIGOFASHION_4e585b'],
            ["id" => 22, "color" => "#4e585b", 'size'=> 31,'photo'=> 'quan_kaki_xam_dam_PIGOFASHION_4e585b'],
            ["id" => 22, "color" => "#4e585b", 'size'=> 32,'photo'=> 'quan_kaki_xam_dam_PIGOFASHION_4e585b'],

            ["id" => 22, "color" => "#60654d", 'size'=> 30,'photo'=> 'quan_kaki_xanh_reu_rengular_PIGOFASHION_60654d'],
            ["id" => 22, "color" => "#60654d", 'size'=> 31,'photo'=> 'quan_kaki_xanh_reu_rengular_PIGOFASHION_60654d'],
            ["id" => 22, "color" => "#60654d", 'size'=> 32,'photo'=> 'quan_kaki_xanh_reu_rengular_PIGOFASHION_60654d'],

            ["id" => 23, "color" => "#000000", 'size'=> 30,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion_black'],
            ["id" => 23, "color" => "#000000", 'size'=> 31,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion_black'],
            ["id" => 23, "color" => "#000000", 'size'=> 32,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion_black'],

            ["id" => 23, "color" => "#ffffff", 'size'=> 29,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion'],
            ["id" => 23, "color" => "#ffffff", 'size'=> 30,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion'],
            ["id" => 23, "color" => "#ffffff", 'size'=> 31,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion'],
            ["id" => 23, "color" => "#ffffff", 'size'=> 32,'photo'=> 'quan_short_the_thao_nam_co_gian_tham_hut_pigofashion'],

            ["id" => 24, "color" => "#cad4f1", 'size'=> 'M','photo'=> 'shirt_blue_cad4f1'],
            ["id" => 24, "color" => "#cad4f1", 'size'=> 'L','photo'=> 'shirt_blue_cad4f1'],
            ["id" => 24, "color" => "#cad4f1", 'size'=> 'XL','photo'=> 'shirt_blue_cad4f1'],

            ["id" => 24, "color" => "#c4bfd5", 'size'=> 'M','photo'=> 'shirt_purple_c4bfd5'],
            ["id" => 24, "color" => "#c4bfd5", 'size'=> 'L','photo'=> 'shirt_purple_c4bfd5'],
            ["id" => 24, "color" => "#c4bfd5", 'size'=> 'XL','photo'=> 'shirt_purple_c4bfd5'],

            ["id" => 24, "color" => "#ffffff", 'size'=> 'M','photo'=> 'shirt_white_ffffff'],
            ["id" => 24, "color" => "#ffffff", 'size'=> 'L','photo'=> 'shirt_white_ffffff'],

            ["id" => 25, "color" => "#000000",'size'=> 'M','photo'=> 'shirt_office_000000'],
            ["id" => 25, "color" => "#000000",'size'=> 'L','photo'=> 'shirt_office_000000'],

            ["id" => 25, "color" => "#b7c0bd",'size'=> 'M','photo'=> 'shirt_office_b7c0bd'],
            ["id" => 25, "color" => "#b7c0bd",'size'=> 'L','photo'=> 'shirt_office_b7c0bd'],
            ["id" => 25, "color" => "#b7c0bd",'size'=> 'XL','photo'=> 'shirt_office_b7c0bd'],
            
            ["id" => 25, "color" => "#ab8c80", 'size' => 'L','photo'=> 'shirt_office_brown_ab8c80'],

            ["id" => 26, "color" => "#74b9ff",'size'=> 'M','photo'=> 'shirt_tay_dai_blue_light'],
            ["id" => 26, "color" => "#74b9ff",'size'=> 'L','photo'=> 'shirt_tay_dai_blue_light'],
            ["id" => 26, "color" => "#74b9ff",'size'=> 'XL','photo'=> 'shirt_tay_dai_blue_light'],

            ["id" => 26, "color" => "#000000",'size'=> 'M','photo'=> 'shirt_tay_dai_den'],
            ["id" => 26, "color" => "#000000",'size'=> 'L','photo'=> 'shirt_tay_dai_den'],

            ["id" => 27, "color" => "#000000",'photo'=> 'stopwatch_casio_black_000000'],
            
            ["id" => 28, "color" => "#d2b39c",'photo'=> 'stopwatch_girl_Marble_Florals_d2b39c'],

            ["id" => 29, "color" => "#d2b39c",'photo'=> 'Túi Halio Canvas'],

            ["id" => 30, "color" => "#d2b39c",'photo'=> 'Túi Tote - Okame Hoa'],

            ["id" => 31, "color" => "#000000", 'size' => 39,'photo'=> 'Giày Sandal Nam MWC -7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic'],
            ["id" => 31, "color" => "#000000", 'size' => 40,'photo'=> 'Giày Sandal Nam MWC -7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic'],
            ["id" => 31, "color" => "#000000", 'size' => 41,'photo'=> 'Giày Sandal Nam MWC -7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic'],
            ["id" => 31, "color" => "#000000",'size' => 42,'photo'=> 'Giày Sandal Nam MWC -7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic'],

            ["id" => 32, "color" => "#000000", 'size'=> 39,'photo'=> 'Giày Sandal Big Size Nam Hiệu Vento_000000'],
            ["id" => 32, "color" => "#000000", 'size'=> 40,'photo'=> 'Giày Sandal Big Size Nam Hiệu Vento_000000'],
            ["id" => 32, "color" => "#000000", 'size'=> 41,'photo'=> 'Giày Sandal Big Size Nam Hiệu Vento_000000'],
            ["id" => 32, "color" => "#000000", 'size'=> 42,'photo'=> 'Giày Sandal Big Size Nam Hiệu Vento_000000'],

            ["id" => 32, "color" => "#B7A078", 'size'=> 40,'photo'=> 'Giày Sandal Nam Vento Capella Nâu Be B7A078'],
            ["id" => 32, "color" => "#B7A078", 'size'=> 41,'photo'=> 'Giày Sandal Nam Vento Capella Nâu Be B7A078'],
            ["id" => 32, "color" => "#B7A078", 'size'=> 42,'photo'=> 'Giày Sandal Nam Vento Capella Nâu Be B7A078'],
            ["id" => 32, "color" => "#B7A078", 'size'=> 43,'photo'=> 'Giày Sandal Nam Vento Capella Nâu Be B7A078'],

            ["id" => 33, "color" => "#ffffff",'photo'=> 'mu-luoi-trai-trang-tron-1'],
            ["id" => 33, "color" => "#000000",'photo'=> 'mu-luoi-trai-den-tron-9'],

            ["id" => 34, "color" => "#ffffff",'photo'=> 'mu-bucket-tron-mau-den-trang-3-510x510'],
            ["id" => 34, "color" => "#000000",'photo'=> 'mu-bucket-tron-mau-den-trang-5-510x510'],
        ];

        $eloquent = new TableProductDetail();
        foreach ($imagesProduct as $value) {
            $eloquent::create([
                "product_id" =>  $value["id"],
                "photo" => 'thumbnails/products/'.$value['photo'].'.png',
                "color" => $value["color"],
                "size" => array_key_exists("size",$value) ? $value["size"]: "",
                "stock" => random_int(10,50),
                "created_at" =>now(),
                "updated_at" =>now(),
            ]);
        }
    }
}
