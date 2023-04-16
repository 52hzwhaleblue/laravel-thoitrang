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


       foreach([1,2] as $item){
        DB::table('table_notifications')->insert([
            "user_id" => 1,
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "chat",
            "created_at" => Carbon::parse('2022-01-01 10:50'),
            "updated_at" => Carbon::parse('2022-01-01 10:50'),
        ]);
       }

       foreach([1,2] as $item){
        DB::table('table_notifications')->insert([
            "user_id" => 2,
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "chat",
            "created_at" => Carbon::parse('2022-01-01 10:50'),
            "updated_at" => Carbon::parse('2022-01-01 10:50'),
        ]);
       }

       foreach([5,6] as $item){
        DB::table('table_notifications')->insert([
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "type" =>  "order",
            "user_id" => 1,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
       }

       foreach([7,8] as $item){
            DB::table('table_notifications')->insert([
                "title" => "title test".$item,
                "subtitle" =>  "subtitle test".$item,
                "type" =>  "daily",
                "is_read" => null,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
       }
    }
}
