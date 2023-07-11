<?php

namespace Database\Seeders;

use App\Models\TableStatic;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eloquent = new TableStatic();

        // Footer
        $eloquent->create([
            "name" => 'Thời Trang C665',
            "type" => 'footer',
            "desc" => 'Chúng tôi luôn trân trọng và mong đợi nhận được mọi ý kiến đóng góp từ khách hàng để có thể nâng cấp trải nghiệm dịch vụ và sản phẩm tốt hơn nữa.',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        // Giới thiệu
        $eloquent->create([
            "name" => 'Câu chuyện về chúng tôi',
            "desc" => 'Đây là chuyên mục giúp các bạn biết được Thoi Trang c665 đã hình thành ra sao và chúng tôi muốn xây dựng một công ty như thế nào!',
            "type" => 'gioi-thieu',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

    }
}
