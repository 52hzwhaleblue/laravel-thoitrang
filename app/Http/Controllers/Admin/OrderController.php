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
use App\Models\TableNotification;



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

    public function edit(Request $request)
    {
        $order_id = $request->get('order_id');
        $user_id = $request->get('user_id');

        $rowOrder = DB::table('table_orders')
            ->where('id',$order_id)
            ->first();

        $rowUser = User::where('id',$user_id)->first();
        $order_details = TableOrderDetail::where('order_id', $order_id)->get()
        ->map(function($order_detail){
            $order_detail->product = TableProduct::find($order_detail->product_id);
            return $order_detail;
        },);
        $order_status = TableOrderStatus::get();

        return view('admin.template.order.detail',compact('order_details','order_status','rowOrder','rowUser'));
    }

    public function update(Request $request)
    {
        $order_status = $request->get('order_status');
        $order_id = $request->query('order_id');
        $user_id = $request->query('user_id');

        // update table_orders
        $order = TableOrder::where('id',$order_id)->where('user_id',$user_id)->first();
        $order->status = $order_status;
        $order->save();

        // update table_notification
        $notification = TableNotification::where('order_id',$order_id)->where('user_id',$user_id)->first();
        $notification->is_read = 1;
        $notification->save();

        return redirect()
            ->route('admin.order.index')
            ->with('message', 'Bạn đã cập nhật đơn hàng thành công!');


    }
}
