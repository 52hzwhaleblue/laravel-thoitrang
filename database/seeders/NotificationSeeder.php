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

       foreach([1,2] as $item){
        $notification_sql->insert([
            "user_id" => 1,
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "user",
            "created_at" => Carbon::parse('2022-01-01 10:50'),
            "updated_at" => Carbon::parse('2022-01-01 10:50'),
        ]);
       }

       foreach([1,2] as $item){
        $notification_sql->insert([
            "user_id" => 2,
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "user",
            "created_at" => Carbon::parse('2022-01-01 10:50'),
            "updated_at" => Carbon::parse('2022-01-01 10:50'),
        ]);
       }

       foreach([5,6] as $item){
        $notification_sql->insert([
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "user",
            "user_id" => 1,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
       }

        foreach([7,8] as $item){
            $notification_sql->insert([
                "title" => "title test".$item,
                "subtitle" =>  "subtitle test".$item,
                "type" =>  "admin",
                "user_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
