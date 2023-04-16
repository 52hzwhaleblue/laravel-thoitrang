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


       foreach([1,2,3,4] as $item){
        DB::table('table_notifications')->insert([
            "user_id" => 1,
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "created_at" => Carbon::parse('2022-01-01 10:50'),
            "updated_at" => Carbon::parse('2022-01-01 10:50'),
        ]);
       }

       foreach([5,6,7,8] as $item){
        DB::table('table_notifications')->insert([
            "title" => "title test".$item,
            "subtitle" =>  "subtitle test".$item,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
       }
    }
}
