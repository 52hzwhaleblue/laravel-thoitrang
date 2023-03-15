<?php

namespace Database\Seeders;

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
         /* Creating 20 table_products with random data. */
      //1 - Nam desc
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Áo polo nam Aristino",
          "slug" => "ao-polo-name-aristino",
          "regular_price" => 250000,
          "sale_price" => 10000,
          "discount" => 4,
          "stock" => random_int(10,60),
          "desc" => "Giới thiệu đến bạn chiếc áo polo nam
            chiếc áo sẽ giúp cho các chàng trai trở nên lịch lãm,
            sang trọng và trẻ trung hơn. Với collection này thì Coolmate
            sẽ mang cho bạn một mẫu áo polo nam với nhưng họa tiết 
            đơn giản nhưng rất trẻ trung và dễ mix đồ chắc chắn nên
              có trong tủ đồ áo nam của bạn",
          "properties" => json_encode([
            "sizes" => ["M (42-50kg)","L (52-64kg)","XL (64-72kg)"],
            "origin" => "Việt Nam",
            "colors" => ["00a8ff","dcdde1","2d3436"],
          ]),
          "view" => random_int(50,5000),
          "category_id" => 2,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //2
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Sandal dây đế bánh mì nữ 5cm nhẹ êm mềm dễ đi quai mảnh rẻ bền đẹp phong cách cá tính",
          "slug" => "sandal-nu",
          "regular_price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "desc" => "• Sản phẩm làm từ chất liệu cao cấp,chắc chắn, mềm mại, dẻo dai.\n
            • Được thiết kế theo công nghệ mới, độ chống trơn trượt cao, mang đến cho người sử dụng cảm giác thoải mái và tự tin khi di chuyển\n
            • Phong cách đơn giản nhưng vẫn hiện đại, bắt kịp xu hướng thời trang mới.\n
            • Đa số sản phẩm đều là hình chụp thật nên quý khách an tâm mua sắm\n
            • Màu sắc sp bên ngoài có thể đậm hơn hoặc nhạt hơn chút xíu so với hình ảnh\n
            • Cam kết hàng mới 100%, giá cả cạnh tranh, hợp túi tiền, chất lượng ổn định.\n",
          "properties" => json_encode([
            "sizes" => [35,36,37,38],
            "origin" => "Việt Nam",
            "colors" => ["f7f1e3"],
          ]),
          "view" => random_int(50,500),
          "category_id" => 4,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //4 - Nữ 
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Guốc cao gót nơ lụa to xinh xắn sang chảnh hàng đẹp.",
          "slug" => "guoc-cao-got-nu",
          "regular_price" => 520000,
          "sale_price" => 25000,
          "discount" => 4.8,
          "desc" => "Giày cao cấp giá sale đó ạ. 
            Gót cao 9p, đen thì có cả 9p và 6p nhoa.
            Những đơn hàng đầu tiên của sp luôn dc giá thấp hơn nhìu nên chị em tranh thủ đặt nha. 😍😍\n
            Giày của shop em là khỏi phải nói về độ đẹp của nó rồi ạ.100 khách mua đều 100 khách khen đẹp và giá quá tốt.
            Shop em chuyên bỏ sỉ nên giá sát mặt đất rẻ nhất thị trường mà chất lượng thì tuyệt vời.\n
            Sang trọng cá tính phù hợp mọi lứa tuổi
            Sale 50%. Khách iu tranh thủ đặt khi còn giá tốt nhé ạ
            Haley Store chuyên hàng cao cấp",
          "properties" => json_encode([
            "sizes" => [36,37,38],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","000000"],
          ]),
          "view" => random_int(50,500),
          "category_id" => 4,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
       //1 - Nữ,Nam 
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Áo thun tay lỡ unisex SADTAGRAM TEE - Áo phông F&S nam nữ",
          "slug" => "ao-thun",
          "regular_price" => 180000,
          "stock" => random_int(10,60),
          "desc" => " Áo thun tay lỡ form rộng kiểu dáng sadboiz ngày nay
           đang trở nên phổ biến trong giới trẻ với sự đa dạng thiết kế kiểu
            dáng độc đáo bắt mắt, là sự lựa chọn không thể bỏ qua của áo thun nam,
             áo thun nữ, áo thun cặp đôi và áo thun hội nhóm ",
          "properties" => json_encode([
            "sizes" => ["S (29-35kg:M31-M41)","XXL (trên 63kg:M7)","M (36-44kg:M42-M52)","L (45-51kg:M53-M59)"],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","000000"],
          ]),
           "view" => random_int(50,500),
          "category_id" => 2,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
       //5 - Kid
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "BỘ COTTON THỂ THAO CHO BÉ TRAI",
          "slug" => "ao-the-thao",
          "regular_price" => 100000,
          "stock" => random_int(10,60),
          "desc" => "Quần chíp đùi in hình cho bé gái nhiều màu sắc dễ thương kết hợp cùng với hình in đáng yêu cho bé sự thích thú khi mặc.\n
            Chất vải 100% cotton co giãn, thấm hút mồ hôi, lưng thun mềm giúp bé thoải mái khi măc.\n
            Thiết kế kiểu dễ thương, giúp bé tự tin khi mặc.",
          "properties" => json_encode([
            "sizes" => ["Size 3 : 8kg - 9kg.","Size 4 :10kg - 11kg.","Size 5: 12kg - 14kg.","Size 6: 15kg - 17kg.","Size 7: 18kg - 20kg."],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","ff5252","34ace0",'4b4b4b',"fff200"],//white-red-blue-black_light-yellow
          ]),
           "view" => random_int(50,500),
          "category_id" => 2,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //5 - Kid
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "name" => "Áo ba lỗ cho bé trai bé gái mùa hè,áo lưới bé trai xuất xịn",
          "slug" => "ao-thun-ba-lo",
          "regular_price" => random_int(100000,600000),
          "stock" => random_int(10,60),
          "desc" => "Áo lưới trẻ em là món đồ mà shop chúng tôi muốn gợi ý cho các mẹ trong thời tiết nóng bức này",
          "properties" => json_encode([
            "sizes" => ["8kg - 9kg.","10kg - 11kg.","12kg - 14kg.","15kg - 17kg.","18kg - 20kg"],
            "origin" => "Việt Nam",
            "colors" => ["ff4d4d","3ae374"],//red-green
          ]),
           "view" => random_int(50,500),
          "category_id" => 2,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
     
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "slug" => "ao-khoac-hoodie",
          "name" => "ÁO HOODIE UNISEX Nam Nữ BASIC CAO CẤP",
          "regular_price" => 350000,
          "sale_price" => 15000,
          "discount" => 4.2,
          "stock" => random_int(10,60),
          "desc" => "💥 Áo Hoodie Nỉ BASIC với Chất liệu Nỉ Ngoại tốt; mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp bạn giữ ấm trong mùa lạnh mà còn có thể chống nắng, chống gió, chống bụi, chống rét, chống tia UV cực tốt, rất tiện lợi nhé!!!
           (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)",
          "properties" => json_encode([
            "sizes" => ["M (40-52kg)","L (53-64kg)","XL (65-75kg)","XXL (76-85kg)"],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","000000","3ae374"],
          ]),
           "view" => random_int(50,500),
          "category_id" => 2,
          "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
      //3 - Nữ
      DB::table('table_products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "slug" => "vay-du-tiec",
            "name" => "Váy đi tiệc dáng xoè dài tay thắt nơ cổ có khoá kéo",
            "regular_price" => 500000,
            "sale_price" => 20000,
            "discount" => 4,
            "stock" => random_int(10,60),
            "desc" => "💥Váy mang phong cách thời trang thời thượng các bạn trẻ; đặc biệt không những giúp 
             (Được sử dụng nhiều trong dịp Lễ hội, Đi chơi, Da ngoại, Dạo phố, Du lịch...)",
            "properties" => json_encode([
              "sizes" => ["M (47-52kg)","L(53-62kg)","S (40-46kg)"],
              "origin" => "Việt Nam",
              "colors" => ["000000","f6b93b"],
            ]),
             "view" => random_int(50,500),
            "category_id" =>2,
            "photo" => "20230307-product1.jpg",
            "photo1" => "20230307-product11.jpg",
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
      );


      //3 - Nữ
      DB::table('table_products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "slug" => "dam-so-mi",
            "name" => "Đầm sơ mi nhún eo chất liệu chiffon phong cách Hàn Quốc cho nữ",
            "regular_price" => 500000,
            "sale_price" => 20000,
            "discount" => 4,
            "stock" => random_int(10,50),
            "desc" => "Phong cách: ngọt ngào và tươi mát / phong cách Nhật Bản\n
            Các yếu tố / hàng thủ công phổ biến: màu trơn, nút\n
            Phong cách: Váy chữ A\nĐộ dài tay áo: Tay áo dài\nChiều dài váy: Váy giữa\n
            Loại cổ áo: Cổ POLO\n",
            "properties" => json_encode([
              "sizes" => ["S 40-47.5kg","M 47.5-52.5kg","L 52.5-57.5kg","XL 57.5-62.5kg"],
              "origin" => "China",
              "colors" => ["000000"],
            ]),
             "view" => random_int(50,500),
            "category_id" => 2,
             "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
        );
      //2- Nam
      DB::table('table_products')->insert(
        [
            "code" => "PROF" . date('Ymd'),
            "name" => "quần jean nam cao cấp ống túm thể thao CGJ 351",
            "slug" => "quan-jean",
            "regular_price" => 150000,
            "stock" => random_int(10,60),
            "desc" => "Quần jean luôn đa dạng về mẫu mã, kiểu dáng cũng như màu sắc. Do đó, các bạn nam có thể tha hồ lựa chọn kiểu dáng ưng ý để khoe cá tính trẻ trung, năng động mỗi khi xuống phố.
            Mẫu Quần Jean với những đường rách ngẫu hứng phối wash nhẹ phía trước rất đẹp mắt. Thiết kế hiện đại, trẻ trung, form quần ống côn trang nhã.\n
            Màu xanh đen thông dụng, cho bạn nhiều lựa chọn khi phối đồ. 
            Chất liệu jean cao cấp, đảm bảo chắc chắn, bền đẹp và vẫn có độ co dãn nhất định khi mặc.\n
              Hai túi trước và hai túi sau tiện lợi, có độ sâu rộng phù hợp.
              Bạn có thể vô tư lựa chọn vì quần có rất nhiều size.",
            "properties" => json_encode([
              "sizes" => ["Dưới 48kg","49-54kg","55-59kg","60-65kg",'66-75kg'],
              "origin" => "Việt Nam",
              "colors" => ["82ccdd"],
            ]),
             "view" => random_int(50,500),
            "category_id" => 2,
             "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
      );
      //id -11 -> quần jean nữ ống rộng
      DB::table('table_products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "slug" => "quan-jean-nu",
            "name" => "Quần jean nữ ống rộng phong cách Ulzzang School",
            "regular_price" => 300000,
            "sale_price" => null,
            "discount" => null,
            "stock" => random_int(10,50),
            "desc" => "Chất liệu Jeans Cotton mềm mát độ dày vừa phải cùng với form baggy suông rộng đem lại cảm giác thoải mái khi mặc thường xuyên",
            "properties" => json_encode([
              "sizes" => ["Size S","Size M","Size L"],
              "origin" => "Việt Nam",
              "colors" => ["000000","48dbfb"],
            ]),
            "view" => random_int(50,500),
            "category_id" => 2,
             "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
      );
    
       //id -12 -> Giày Thể Thao Nữ TU2128
       DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "slug" => "giay-the-thao-nu",
          "name" => "Giày Thể Thao Nữ TU2128",
          "regular_price" => 300000,
          "sale_price" => null,
          "discount" => null,
          "stock" => random_int(10,50),
          "desc" => "Chính hãng 100%, đẹp thoải mái, tự tin cá tính",
          "properties" => json_encode([
            "sizes" => [35,36,37,38],
            "origin" => "Việt Nam",
            "colors" => ["F7F1E5"],
          ]),
           "view" => random_int(50,500),
          "category_id" => 4,
           "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );

        //id -13 -> Giày Thể Thao Nữ TU2128
      DB::table('table_products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "name" => "Túi xách da nữ handmade VLS 8001",
            "slug" => "tui-xach",
            "regular_price" => 800000,
            "sale_price" => 40000,
            "discount" => 5,
            "stock" => random_int(10,50),
            "desc" => "Nếu bạn muốn sở hữu một chiếc túi xách nữ đẳng cấp, 
            mang đậm chất nữ tính thì túi xách nữ da thật Gento mã VLS 8001 là một lựa chọn hợp lý.",
            "properties" => json_encode([
              "sizes" => [],
              "origin" => "Việt Nam",
              "colors" => [],
            ]),
             "view" => random_int(50,500),
            "category_id" => 3,
             "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
      );
      //id;14
      DB::table('table_products')->insert(
          [
            "code" => "PROF" . date('Ymd'),
            "name" => "Mắt Kính Pedro / 4M / MKPD5",
            "slug" => "mat-kinh-nam-nu",
            "regular_price" => 250000,
            "sale_price" => null,
            "discount" => null,
            "stock" => random_int(10,50),
            "desc" => "Phong cách thời trang trẻ trung đẹp với các bạn trẻ",
            "properties" => json_encode([
              "sizes" => [],
              "origin" => "Việt Nam",
              "colors" => ["000000","fed330","45aaf2"],
            ]),
             "view" => random_int(50,500),
            "category_id" => 6,
             "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
          ]
      );
       //id;15
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "slug" => "mat-kinh",
          "name" => "Mắt kính chống bức xạ phong cách thời trang sành điệu",
          "regular_price" => 105000,
          "sale_price" => null,
          "discount" => null,
          "stock" => random_int(10,50),
          "desc" => "Kính/mắt kính dùng máy tính là mắt kính có mục đích đặc biệt/mắt kính dùng để tối ưu hóa thị lực. Thiết kế kính/mắt kính dành cho cả nam và nữ sử dụng, giá cả phải chăng, và thoải mái hơn. Kính/mắt kính được làm bằng chất liệu acetate chất lượng đảm bảo độ bền cực cao và tạo sự thoải mái tối đa cho người đeo.",
          "properties" => json_encode([
            "sizes" => [],
            "origin" => "Việt Nam",
            "colors" => ["ffffff","45aaf2"],
          ]),
          //tao comment chỗ này
           "view" => random_int(50,500),
          "category_id" => 6,
           "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
    //id;16
      DB::table('table_products')->insert(
        [
          "code" => "PROF" . date('Ymd'),
          "slug" => "dong-ho-nam",
          "name" => "Đồng Hồ Nam Crnaira Japan C3079 Siêu Mỏng Dây Thép Lụa Cao Cấp",
          "regular_price" => 300000,
          "sale_price" => null,
          "discount" => null,
          "stock" => random_int(10,50),
          "desc" => "Máy Siêu Mỏng, (hiện những đồng hồ đầy đủ chức năng này rất hiếm vì chi phí sản xuất rất cao)\n
          •	Kiểu dáng năng động và lịch lãm (phong cách doanh nhân châu âu)\n
          •	Chống nước sinh hoạt + Mặt kính Mineral rất trong và chồng trầy sinh hoạt.",
          "properties" => json_encode([
            "sizes" => [],
            "origin" => "Châu âu",
            "colors" => ["000000"],
          ]),
           "view" => random_int(50,500),
          "category_id" => 5,
           "photo" => "20230307-product1.jpg",
          "photo1" => "20230307-product11.jpg",  
          "created_at" => date("Y-m-d H:i:s"),
          "updated_at" => date("Y-m-d H:i:s"),
        ]
      );
    }
}
