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
            "ao_ba_lo_#232746" => 1,
            "ao_ba_lo_grey_bold"=> 1,
            "ao_khoac_da_lot_du_cao_ cap_ADN10_den"=> 2,
            "ao_polo_green"=> 3,
            "ao_polo_red"=> 3,
            "ao_polo_trang"=> 3,
            "ao_thun_#495934"=> 4,
            "ao_thun_den_#00000"=> 4,
            "ao_thun_tay_dai_#657689"=> 5,
            "aothun_tay_dai_white"=> 5,
            "dong_ho_EFR-526L-1AV"=> 6,
            "dong_ho_nu_SHE-4538GL-7A"=> 7,
            "glasses_butterfly _classic_Gọng_Kim_Loại_pink_#b88491"=> 8,
            "glasses_butterfly _classic_Gọng_Kim_Loại_purple_#b7a1c6"=> 8,
            "glasses_fashion_chong_den_cho_nu_JOMO EYEWEAR"=> 9,
            "glasses_round_classic_pink_light_#d9b4ac"=> 10,
            "glasses_round_classic_purple#8b81a2"=> 10,
            "handbag_big_satchel_2_ngăn_#000000"=> 11,
            "handbag_big_satchel_2_ngăn_#e4cfc4"=> 11,
            "handbag_big_satchel_2_ngăn_#e5e1dc"=> 11,
            "handbag_di_choi_tiec_#b48d82"=> 12,
            "handbag_men_office_latop"=> 13,
            "handbag_NAHA_#b6ccb6"=> 14,
            "handbag_NAHA_#dcccbf"=> 14,
            "hight_feel_black_#000000"=> 15,
            "hight_feel_white"=> 15,
            "hoodie_drew_black"=> 16,
            "hoodie_drew_brown"=> 16,
            "icebreaker_#d4e0e8"=> 17,
            "icebreaker_#edd3e1"=> 17,
            "icebreaker_black"=> 17,
            "Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey Grey Smoke"=> 18,
            "Nike_Air_Jordan_1_High_OG_Metallic_Blue_#5a6c89"=> 19,
            "Nike_Air_Jordan_1_High_OG_Metallic_grey_#88898b"=>19,
            "quan_baggy_nam_nu_#b7a078"=>20,
            "quan_jogger_the_thao_tron_bacsic_#9b9fa3" => 21,
            "quan_jogger_the_thao_tron_bacsic_#232c47"=>21,
            "quan_kaki_xam_dam_PIGOFASHION_#4e585b"=> 22,
            "quan_kaki_xanh_reu_rengular_PIGOFASHION_#60654d"=>22,
            "quan_short_the_thao_nam_co_gian_tham_hut_pigofashion_black"=>23,
            "quan_short_the_thao_nam_co_gian_tham_hut_pigofashion"=>23,
            "shirt_blue_#cad4f1" => 24,
            "shirt_purple_#c4bfd5"=>24,
            "shirt_white_#ffffff" =>24,
            "shirt_office_#000000" => 25,
            "shirt_office_#b7c0bd" => 25,
            "shirt_office_brown_#ab8c80"=> 25,
            "shirt_tay_dai_blue_light" =>26,
            "shirt_tay_dai_den" =>26,
            "stopwatch_casio_black_#000000" =>27,
            "stopwatch_girl_Marble_Florals_#d2b39c" =>28,
            "Túi Halio Canvas" =>29,
            "Túi Tote - Okame Hoa" =>30,
        ]; 

        $eloquent = new TableProductDetail();

        foreach ($imagesProduct as $value => $key) {
            $eloquent::create([
                "product_id" =>  $key,
                "photo" => 'thumbnails/products/'.$value.'.png',
                "created_at" =>now(),
                "updated_at" =>now(),
            ]);
        }
    }
}
