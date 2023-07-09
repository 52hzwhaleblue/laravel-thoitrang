<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $db = new DB();

        $notification_sql = $db::table('table_notifications');

       foreach([1,2,3,4,5,6,7,8,9,10] as $item){
        $notification_sql->insert([
            "user_id" => 32,
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "user",
            "is_read" => 1,
            "created_at" => Carbon::parse('2022-01-01 10:50'),
            "updated_at" => Carbon::parse('2022-01-01 10:50'),
        ]);
       }

    }
}
