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
use App\Models\TablePromotion;

class OrderController extends BaseController
{
    public function fetchAll(TableOrder $order_sql){
        try {
            $userId = Auth::id();

            $order_query = $order_sql::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
                            ->orderByDesc('created_at')
                            ->where('user_id', $userId); 

            $completed = $order_query
            ->withExists('review as evaluated')
            ->where('status',-1)
            ->get();

            $toReceive = $order_query
            ->where('status',3)
            ->get();

            $toShip = $order_query
            ->where('status',2)
            ->get();

            $toPay = $order_query
            ->where('status',1)
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

    public function create(Request $request,DB $db,TableOrder $order_sql ){
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
            

            $db::transaction(function () use ($request,$order_sql) {
                $time = now();

                
                $order = $order_sql::create([
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

            $order = $order_sql::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->where('user_id', Auth::id())
            ->first();

            return $this->sendResponse($order, "Create order successfully!!!");


        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function delete(Request $request){
        try {
            $order_id = $request->query("order_id");

            DB::table('table_orders')
            ->where("id",$order_id)
            ->where('user_id',Auth::id())
            ->delete();

            return $this->sendResponse([], "Delete order successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function checkPromotion(Request $request){
        try {
            $idPromotion = $request->input("idPromotion");

            $promotion = TablePromotion::find($idPromotion);
          
            if($promotion->limit < 1){
                return $this->sendResponse(201, "Apply promotion failure!!!");
            }

            return $this->sendResponse(200, "Apply promotion successfully!!!");
        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
