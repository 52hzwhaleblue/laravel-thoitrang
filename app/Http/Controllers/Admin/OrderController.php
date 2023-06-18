<?php

namespace App\Http\Controllers\Admin;

use App\Events\UpdateOrderEvent;
use App\Http\Controllers\Controller;
use App\Models\TableProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Jobs\InsertPushNotiJob;
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
        $orders = DB::table('table_orders')->orderByDesc('created_at')->get()
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
        $order_id = (int)$request->query('order_id');
        $user_id = $request->query('user_id');
        $color = $request->get('color');
        $product_id = $request->get('product_id');

        //update table_orders
        $order = TableOrder::where('id',$order_id)->where('user_id',$user_id)->first();
        $order->status_id = $order_status;
        $order->save();

        // Tăng SLTK khi hủy đơn hàng
        if($order_status == 5){
            $order_detail = TableOrderDetail::where('order_id',$order_id)->get();
            foreach ($order_detail as $k => $v)
            {
                $product_id =$v->product_id;
                $color =$v->color;
                $qty = $v->quantity;

                $product_detail = TableProductDetail::where('product_id',$product_id)
                    ->where('color',$color)
                    ->first();
                $product_detail->stock +=$qty;
                $product_detail->save();
            }
            return redirect()
                ->route('admin.order.index')
                ->with('message', 'Bạn đã hủy đơn hàng thành công!');
        }
//        $dataNoti =  [
//            "user_id" => $user_id,
//            "order_id" => $order_id,
//            "status" => $order_status,
//        ];
//
//        $this->handlePushNoti($dataNoti,$order);
//
//        $this->handleUpdateStatus($dataNoti);



        return redirect()
            ->route('admin.order.index')
            ->with('message', 'Bạn đã cập nhật đơn hàng thành công!');
    }

    private function handleUpdateStatus($dataNoti){
        $data = [         
            "order_id" => (int)$dataNoti["order_id"],
            "new_status" => (int)$dataNoti["status"],     
        ];

        $response = [
            "data" => $data,
            "type" => "order",
        ];

        $this->pusher('pusher-user-'.$dataNoti["user_id"],'update-order',$response);
    }

    private function handlePushNoti($data,$order){

        $subtitle = "";

        if($data['status'] == 2){
            $subtitle = "Đơn hàng ".$order->code ." của bạn đã được xác nhận";
        }else if($data['status'] == 3){
            $subtitle = "Đơn hàng ".$order->code ." của bạn đã đang được vận chuyển. Hãy chú ý các cuộc gọi từ bộ phận giao hàng";
        }else if($data['status'] == 4){
            $subtitle = "Đơn hàng ".$order->code ." của bạn đã được giao hoàn tất";
        }

         //create notification
         $notification = TableNotification::create([
            "user_id" => $data["user_id"],
            "title" => "Hệ thống đơn hàng",
            "order_id" => $data["order_id"],
            "subtitle" => $subtitle,
            "type" => "user",
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        $response = [
            "data" => $notification,
            "type" => "notification",
        ];

        $this->pusher('pusher-user-'.$notification->user_id,'notification',$response);

        //push notification for client user id
        $this->sendNotiToUser($data["user_id"],$notification->title,$notification->subtitle, $notification->type);
    }
}
