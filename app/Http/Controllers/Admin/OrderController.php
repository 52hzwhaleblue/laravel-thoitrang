<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;

use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\User;
use App\Models\TableProduct;
use App\Models\TableOrderStatus;


class OrderController extends BaseController
{
    public function index()
    {
        $orders = DB::table('table_orders')->get()
        ->map(function($order){
            $order->user = User::find($order->user_id);
            return $order;
        },);

        $order_status = DB::table('table_order_status')->get();
        // return $order_status;
        return view('admin.template.order.order', compact('orders','order_status'));
    }

    public function edit($order_id,$user_id)
    {
        // dd($order_id);
        $rowOrder = DB::table('table_orders')->where('user_id',$user_id)->first();
        $rowUser = User::where('id',$user_id)->first();
        $order_details = TableOrderDetail::where('order_id', $order_id)->get()
        ->map(function($order_detail){
            $order_detail->product = TableProduct::find($order_detail->product_id);
            return $order_detail;
        },);
        $order_status = TableOrderStatus::get();

        return view('admin.template.order.detail',compact('order_details','order_status','rowOrder','rowUser'));
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
