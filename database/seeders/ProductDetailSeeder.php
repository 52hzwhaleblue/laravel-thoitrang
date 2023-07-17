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
            "ao_ba_lo_blue_bold" => ["id" => 1,"size"=>"3XL" ,"color" => "#232645"],
            "ao_ba_lo_grey_bold"=> ["id" => 1,"size"=>"3XL" ,"color" => "#95a5a5"],
            "ao_khoac_da_lot_du_cao_ cap_ADN10_den"=> ["id" => 2,"size"=>"3XL" ,"color" => "#000000"],
            "ao_polo_green"=> ["id" => 3,"size"=>"3XL" ,"color" => "#26ae50"],
            "ao_polo_red"=> ["id" => 3,"size"=>"3XL" ,"color" => "#e64c3c"],
            "ao_polo_trang"=> ["id" => 3,"size"=>"3XL" ,"color" => "#ffffff"],
            "ao_thun_green"=> ["id" => 4,"size"=>"3XL" ,"color" => "#495934"],
            "ao_thun_den"=> ["id" => 4,"size"=>"3XL" ,"color" => "#000000"],
            "ao_thun_tay_dai_657689"=> ["id" => 5,"size"=>"3XL" ,"color" => "#556578"],
            "aothun_tay_dai_white"=> ["id" => 5,"size"=>"3XL" ,"color" => "#ffffff"],
            "dong_ho_EFR-526L-1AV"=> ["id" => 6,"size"=>"3XL" ,"color" => "#000000"],
            "dong_ho_nu_SHE-4538GL-7A"=> ["id" => 7,"size"=>"3XL" ,"color" => "#4834d4"],
            "glasses_butterfly _classic_Gọng_Kim_Loại_pink_b88491"=> ["id" => 8,"size"=>"3XL" ,"color" => "#b88491"],
            "glasses_butterfly _classic_Gọng_Kim_Loại_purple_b7a1c6"=> ["id" => 8,"size"=>"3XL" ,"color" => "#b7a1c6"],
            "glasses_fashion_chong_den_cho_nu_JOMO EYEWEAR"=> ["id" => 9,"size"=>"3XL" ,"color" => "#000000"],
            "glasses_round_classic_pink_light_d9b4ac"=>  ["id" => 10,"size"=>"3XL" ,"color" => "#d9b4ac"],
            "glasses_round_classic_purple8b81a2"=>  ["id" => 10,"size"=>"3XL" ,"color" => "#8b81a2"],
            "handbag_big_satchel_2_ngăn_000000"=>  ["id" => 11,"size"=>"3XL" ,"color" => "#000000"],
            "handbag_big_satchel_2_ngăn_e4cfc4"=>  ["id" => 11,"size"=>"3XL" ,"color" => "#e4cfc4"],
            "handbag_big_satchel_2_ngăn_e5e1dc"=>  ["id" => 11,"size"=>"3XL" ,"color" => "#e5e1dc"],
            "handbag_di_choi_tiec_b48d82"=>  ["id" => 12,"size"=>"3XL" ,"color" => "#b48d82"],
            "handbag_men_office_latop"=> ["id" => 13,"size"=>"3XL" ,"color" => "#000000"],
            "handbag_NAHA_b6ccb6"=> ["id" => 14,"size"=>"3XL" ,"color" => "#b6ccb6"],
            "handbag_NAHA_dcccbf"=> ["id" => 14,"size"=>"3XL" ,"color" => "#dcccbf"],
            "hight_feel_black_000000"=>  ["id" => 15,"size"=>"3XL" ,"color" => "#000000"],
            "hight_feel_white"=>  ["id" => 15,"size"=>"3XL" ,"color" => "#ffffff"],
            "hoodie_drew_black"=> ["id" => 16,"size"=>"3XL" ,"color" => "#000000"],
            "hoodie_drew_brown"=> ["id" => 16,"size"=>"3XL" ,"color" => "#914900"],
            "icebreaker_d4e0e8"=> ["id" => 17,"size"=>"3XL" ,"color" => "#d4e0e8"],
            "icebreaker_edd3e1"=> ["id" => 17,"size"=>"3XL" ,"color" => "#edd3e1"],
            "icebreaker_black"=> ["id" => 17,"size"=>"3XL" ,"color" => "#000000"],
            "Kính Mát Thời Trang Chống Loá JOMO EYEWEAR - Bailey Grey Smoke"=>  ["id" => 18,"size"=>"3XL" ,"color" => "#ffffff"],
            "Nike_Air_Jordan_1_High_OG_Metallic_Blue_5a6c89"=>   ["id" => 19,"size"=>"3XL" ,"color" => "#5a6c89"],
            "Nike_Air_Jordan_1_High_OG_Metallic_grey_88898b"=>  ["id" => 19,"size"=>"3XL" ,"color" => "#88898b"],
            "quan_baggy_nam_nu_b7a078"=>["id" => 20,"size"=>"3XL" ,"color" => "#b7a078"],
            "quan_jogger_the_thao_tron_bacsic_9b9fa3" => ["id" => 20,"size"=>"3XL" ,"color" => "#9b9fa3"],
            "quan_jogger_the_thao_tron_bacsic_232c47"=>["id" => 20,"size"=>"3XL" ,"color" => "#232c47"],
//            "quan_kaki_xam_dam_PIGOFASHION_4e585b"=> ["id" => 22,"size"=>"3XL" ,"color" => "#4e585b"],
//            "quan_kaki_xanh_reu_rengular_PIGOFASHION_60654d"=>["id" => 22,"size"=>"3XL" ,"color" => "#60654d"],
//            "quan_short_the_thao_nam_co_gian_tham_hut_pigofashion_black"=>["id" => 23,"size"=>"3XL" ,"color" => "#000000"],
//            "quan_short_the_thao_nam_co_gian_tham_hut_pigofashion"=>["id" => 23,"size"=>"3XL" ,"color" => "#ffffff"],
//            "shirt_blue_cad4f1" => ["id" => 24,"size"=>"3XL" ,"color" => "#cad4f1"],
//            "shirt_purple_c4bfd5"=>["id" => 24,"size"=>"3XL" ,"color" => "#c4bfd5"],
//            "shirt_white_ffffff" =>["id" => 24,"size"=>"3XL" ,"color" => "#ffffff"],
//            "shirt_office_000000" => ["id" => 25,"size"=>"3XL" ,"color" => "#000000"],
//            "shirt_office_b7c0bd" => ["id" => 25,"size"=>"3XL" ,"color" => "#b7c0bd"],
//            "shirt_office_brown_ab8c80"=> ["id" => 25,"size"=>"3XL" ,"color" => "#ab8c80"],
//            "shirt_tay_dai_blue_light" =>["id" => 26,"size"=>"3XL" ,"color" => "#74b9ff"],
//            "shirt_tay_dai_den" =>["id" => 26,"size"=>"3XL" ,"color" => "#000000"],
//            "stopwatch_casio_black_000000" =>["id" => 27,"size"=>"3XL" ,"color" => "#000000"],
//            "stopwatch_girl_Marble_Florals_d2b39c" =>["id" => 28,"size"=>"3XL" ,"color" => "#d2b39c"],
//            "Túi Halio Canvas" =>["id" => 29,"size"=>"3XL" ,"color" => "#d2b39c"],
//            "Túi Tote - Okame Hoa" =>["id" => 30,"size"=>"3XL" ,"color" => "#d2b39c"],
//            "Giày Sandal Nam MWC -7066 Giày Sandal Nam Quai Chéo Kiểu Dáng Basic" =>["id" => 31,"size"=>"3XL" ,"color" => "#000000"],
//            "Giày Sandal Big Size Nam Hiệu Vento_000000" =>["id" => 32,"size"=>"3XL" ,"color" => "#000000"],
//            "Giày Sandal Nam Vento Capella Nâu Be B7A078" =>["id" => 32,"size"=>"3XL" ,"color" => "#B7A078"],
//            "mu-luoi-trai-trang-tron-1" =>["id" => 33,"size"=>"3XL" ,"color" => "#ffffff"],
//            "mu-luoi-trai-den-tron-9" =>["id" => 33,"size"=>"3XL" ,"color" => "#000000"],
//            "mu-bucket-tron-mau-den-trang-3-510x510" =>["id" => 34,"size"=>"3XL" ,"color" => "#ffffff"],
//            "mu-bucket-tron-mau-den-trang-5-510x510" =>["id" => 34,"size"=>"3XL" ,"color" => "#000000"],
        ];

        $eloquent = new TableProductDetail;

        foreach ($imagesProduct as $key => $value) {
            $eloquent::create([
                "product_id" =>  $value["id"],
                "photo" => 'thumbnails/products/'.$key.'.png',
               "size"=>"3XL" ,"color" => $value["color"],
                "stock" => random_int(10,50),
                "created_at" =>now(),
                "updated_at" =>now(),
            ]);
        }
    }
}
