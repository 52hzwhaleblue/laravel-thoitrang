<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PhotoSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PromotionSeeder;
use Database\Seeders\NotificationSeeder;
use Database\Seeders\ProductDetailSeeder;
use Database\Seeders\StaticSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductDetailSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(PromotionSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(StaticSeeder::class);
    }
}
