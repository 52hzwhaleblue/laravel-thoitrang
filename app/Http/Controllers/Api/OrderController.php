<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\TableOrder;
use Illuminate\Support\Str;
use App\Jobs\CreateOrderJob;
use App\Models\TableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableOrderDetail;

class OrderController extends BaseController
{
    public function fetchAll(){
        try {
            $userId = Auth::id();

            $completed = TableOrder::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->withExists('review as evaluated')
            ->where('status',-1)
             ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->get();

            $toReceive = TableOrder::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->where('status',3)
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->get();

            $toShip = TableOrder::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->where('status',2)
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->get();

            $toPay = TableOrder::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->where('status',1)
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->get();

            $response = [
                "to_pay" => $toPay,
                "to_ship" => $toShip,
                "to_receive" => $toReceive,
                "completed" => $completed,
            ];

            return $this->sendResponse($response, "Fetch order successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function create(Request $request,DB $db){
        try {
            $validator = Validator::make($request->all(),
            [
                'shipping_fullname' => "nullable|required",
                'shipping_phone' => "nullable|required",
                'shipping_address' => "nullable|required",
                'payment_method' => "nullable|required",
                'temp_price' => "nullable|required",
                'total_price' => "nullable|required",
                'ship_price' =>"nullable|required",
                'notes' => "nullable|required",
                'list_product' => "nullable|required",
            ]);



            if($validator->fails()){
                return $this->sendError('validation error',$validator->errors(),401);
            }

            $db::transaction(function () use ($request) {
                $time = now();
                $order = TableOrder::create([
                    'code' => 'HDKR' . Str::random(5). date('Ymd'),
                    'user_id' => Auth::id(),
                    'shipping_fullname' => $request->shipping_fullname,
                    'shipping_phone' => $request->shipping_phone,
                    'shipping_address' => $request->shipping_address,
                    'payment_method' => $request->payment_method,
                    'temp_price' => $request->temp_price,
                    'total_price' => $request->total_price,
                    'ship_price' => $request->ship_price,
                    'notes' => $request->notes,
                    'status' => 1,
                    'created_at' =>  $time,
                    'updated_at' =>  $time
                ]);

                $list = json_decode($request->input("list_product"));

                $tableDetail = new TableOrderDetail();
                foreach( $list as $item){
                    $tableDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product->id,
                        'color' => $item->color,
                        'size' => $item->size,
                        'quantity' => $item->quantity,
                        'photo' => $item->photo,
                        'created_at' =>  $time ,
                        'updated_at' =>  $time
                    ]);
                }

            });

            $order = TableOrder::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->where('user_id', Auth::id())
            ->first();

            return $this->sendResponse($order, "Create order successfully!!!");


        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function delete(Request $request){
        try {
            $order_id = (int)request()->query("order_id");

            DB::table('table_orders')
            ->where("id",$order_id)
            ->where('user_id',Auth::id())
            ->delete();

            return $this->sendResponse([], "Delete order successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
