<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TableOrder;
use App\Models\TableOrderDetail;
use App\Models\User;
use App\Models\TableProduct;
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
        // return $datas;

        return view('admin.template.order.order', compact('datas'));
    }

    public function edit($id,$user_id)
    {
        $rowOrder = TableOrder::where('user_id',$user_id)->first();
        $rowUser = User::where('id',$user_id)->first();
        $data = TableOrderDetail::where('order_id', $id)->get()
        ->map(function($order_detail){
            $order_detail->product = TableProduct::find($order_detail->product_id);
            return $order_detail;

        },);
        // return $rowOrder;
        return view('admin.template.order.detail',compact('data','rowOrder','rowUser'));
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
