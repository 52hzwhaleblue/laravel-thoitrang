<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Jobs\CreateOrderJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\TableProduct;

class OrderController extends BaseController
{
    public function fetchAll(Request $request){   
        try {     
           $orders = DB::table('table_orders')
            ->where('user_id','=',Auth::id())
            ->get()
            ->map(function($order) {
                $order->order_detail = DB::table('table_order_details')
                ->where("order_id", $order->id)
                ->get()
                ->map(function($order_detail_child){
                    $order_detail_child->product = TableProduct::with('productDetail')->
                    select('id','name','regular_price','discount','sale_price')
                    ->find($order_detail_child->product_id);
                    return $order_detail_child;
                });
                $order->evaluated = DB::table('table_reviews')->where('order_id',$order->id)->exists();
                return $order;
            });

            return $this->sendResponse($orders, "Fetch order successfully!!!");
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function create(Request $request){
        try {         
            $validator = Validator::make($request->all(), 
            [
                'shipping_fullname' => "nullable",
                'shipping_phone' => "nullable",
                'shipping_address' => "nullable",
                'order_payment' => "nullable",
                'temp_price' => "nullable",
                'total_price' => "nullable",
                'ship_price' =>"nullable",
                'requirements' => "nullable",
                'notes' => "nullable",
                'list_product' => "nullable",
            ]);
         
     
            if($validator->fails()){
                return $this->sendError('validation error',$validator->errors(),401);
            }

            $order_id = DB::table('table_orders')->insertGetId([
                'code' => 'HDKR' . Str::random(5). date('Ymd'),
                'user_id' => Auth::id(),
                'shipping_fullname' => $request->shipping_fullname,
                'shipping_phone' => $request->shipping_phone,
                'shipping_address' => $request->shipping_address,
                'order_payment' => $request->order_payment,
                'temp_price' => $request->temp_price,
                'total_price' => $request->total_price,
                'ship_price' => $request->ship_price,
                'requirements' => $request->requirements,
                'notes' => $request->notes,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $list = json_decode($request->input("list_product"));
            foreach( $list as $item){
                DB::table('table_order_details')->insert([
                    'order_id' => $order_id,
                    'product_id' => $item->product_id,
                    'color' => $item->color,
                    'size' => $item->size,
                    'quantity' => $item->quantity,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }

            $orders = DB::table('table_orders')
            ->where('user_id','=',Auth::id())
            ->where('id','=',$order_id)
            ->get()
            ->map(function($order) {
                $order->order_detail = DB::table('table_order_details')
                ->where("order_id", $order->id)
                ->get()
                ->map(function($order_detail_child){
                    $order_detail_child->product = TableProduct::with('productDetail')->
                    select('id','name','regular_price','discount','sale_price')
                    ->find($order_detail_child->product_id);
                    return $order_detail_child;
                });
                ;
                return $order;
            });

        return $this->sendResponse($orders[0], "Create order successfully!!!");


        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function delete(Request $request){
        try { 
            $order_id = request()->query("order_id");
            
            DB::table('table_orders')
            ->where('user_id','=',Auth::id())
            ->delete($order_id);

            return $this->sendResponse([], "Delete order successfully!!!");
        } catch (\Throwable $th) { 
            return $this->sendError( $th->getMessage(),500);
        }
    }
}
