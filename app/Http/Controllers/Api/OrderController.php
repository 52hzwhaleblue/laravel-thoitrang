<?php

namespace App\Http\Controllers\Api;


use Carbon\Carbon;
use App\Models\Product;
use App\Models\TableOrder;
use App\Jobs\InsertOrderJob;
use Illuminate\Http\Request;
use App\Models\TablePromotion;
use App\Models\TableOrderDetail;
use App\Models\TableNotification;
use App\Models\TableProductDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;
use App\Http\Controllers\Api\BaseController as BaseController;

class OrderController extends BaseController
{
    public function fetchAll(){
        try {
            $userId = Auth::id();

            $order = new TableOrder();

            $toPay = $order::with(['orderDetail','promotion' ,'orderDetail.product','orderDetail.product.productDetail'])
            
            ->where('user_id', $userId)
            ->where('status_id',1)
            ->get();
                            
            $completed = $order::with(['orderDetail','promotion' ,'orderDetail.product','orderDetail.product.productDetail'])
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->withExists('review as evaluated')
            ->where('status_id',4)
            ->get();

            $toReceive =  $order::with(['orderDetail','promotion' ,'orderDetail.product','orderDetail.product.productDetail'])
            ->orderByDesc('created_at')
            ->where('user_id', $userId)
            ->where('status_id',3)
            ->get();

            $toShip = $order::with(['orderDetail','promotion' ,'orderDetail.product','orderDetail.product.productDetail'])
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

            //$this->createPushNoti();

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
            


            $order = TableOrder::with(['orderDetail', 'promotion','orderDetail.product','orderDetail.product.productDetail'])
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->first();

            // $this->createPushNoti($order->id);
            
            return $this->sendResponse( $order, "Create order successfully!!!");
            


        } catch (\Throwable $th) {
            return $this->sendError( $th->getMessage(),500);
        }
    }


    public function delete(Request $request,TableOrder $order_sql,TableOrderDetail $order_detail_sql,TableProductDetail $product_detail_sql){
        try {
            $order_id = $request->query("order_id");

            $order = $order_sql::find($order_id);

            $list_product = $order_detail_sql::where('order_id',$order->id)->get();

            foreach($list_product as $item){

                $color = $item->color;
                
                $detail = $product_detail_sql::where('product_id',$item->product_id)
                ->where('color',$color)->first();

                
                $detail->update([
                    "stock" => $detail->stock + $item->quantity
                ]);
            }

            if(!empty($order->promotion_id)){
                //check apply promotion

                $promotion_sql = new TablePromotion();
                
                $promotion = $promotion_sql::find($order->promotion_id);

                $promotion->update(["limit" => $promotion->limit + 1]);

            }

            //delete order
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
