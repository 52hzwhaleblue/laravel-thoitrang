<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;




class OrderController extends BaseController
{
    public function index()
    {
        $datas = DB::table('table_orders')->get()
        ->map(function($order){
            $order->user = User::find($order->user_id);
            return $order;
        },);


        return view('admin.template.order.order', compact('datas'));
    }

    public function testOrder(){
        $channel = "OrderNotification";
        $data = [
            "123",
            "123",
            "123",
            "123",
        ];
        return $this->pusher($channel,"realtime-order",$data);
    }
}
