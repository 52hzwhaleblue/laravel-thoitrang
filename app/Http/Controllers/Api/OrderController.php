<?php

namespace App\Http\Controllers\Api;


use App\Models\Product;
use App\Models\TableOrder;
use App\Jobs\InsertOrderJob;
use Illuminate\Http\Request;
use App\Models\TablePromotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class OrderController extends BaseController
{
    public function fetchAll(TableOrder $order_sql){
        try {
            $userId = Auth::id();

            $toPay = $order_sql::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->where('status_id',1)
            ->get();
                            
            $completed = $order_sql::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->withExists('review as evaluated')
            ->where('status_id',4)
            ->get();

            $toReceive =  $order_sql::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->where('status_id',3)
            ->get();

            $toShip = $order_sql::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->where('status_id',2)
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

    public function create(Request $request,DB $db ){
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
                'id_promotion' => "nullable|required",
            ]);

            if($validator->fails()){
                return $this->sendError('validation error',$validator->errors(),401);
            }

            $data =  [
                'user_id' => Auth::id(),
                'shipping_phone' => $request->input('shipping_phone'),
                'shipping_fullname' => $request->input('shipping_fullname'),
                'shipping_address' => $request->input('shipping_address'),
                'payment_method' => $request->input('payment_method'),
                'temp_price' => $request->input('temp_price'),
                'total_price' => $request->input('total_price'),
                'ship_price' =>$request->input('ship_price'),
                'notes' => $request->input('notes'),
                'id_promotion' => $request->input('id_promotion'),
            ];
            

            $job = new InsertOrderJob($request->input('list_product'),$data);
        

            $db::transaction(function () use ($job) {   
                dispatch($job);
            });
        

            $order = TableOrder::with(['orderDetail', 'orderDetail.product','orderDetail.product.productDetail'])
            ->where('user_id', Auth::id())
            ->first();

            return $this->sendResponse( $order, "Create order successfully!!!");


        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function delete(Request $request){
        try {
            $order_id = $request->query("order_id");

            $order_sql = new TableOrder();

            $order = $order_sql::find($order_id);

            

            $order->delete();
         

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
