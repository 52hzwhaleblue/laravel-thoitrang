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
            "name" => 'Xưởng Jean Nam 9668',
            "type" => 'footer',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

        // Giới thiệu
        $eloquent->create([
            "name" => 'Giới thiệu về chúng tôi',
            "desc" => 'Giới thiệu về chúng tôi',
            "type" => 'gioi-thieu',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);

    }
}
