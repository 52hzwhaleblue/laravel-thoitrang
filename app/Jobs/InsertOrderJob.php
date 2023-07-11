<?php

namespace App\Jobs;

use Pusher\Pusher;
use App\Models\TableOrder;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use Illuminate\Bus\Queueable;
use App\Models\TablePromotion;
use App\Models\TableOrderDetail;
use App\Models\TableNotification;
use App\Models\TableProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class InsertOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $list_product;

    protected $map_param_order;


    private $result;


    public function __construct($list_product,$map_param_order)
    {
        $this->list_product = $list_product;

        $this->map_param_order = $map_param_order;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $time = now();

        $order_sql = new TableOrder();
      
        $order = $order_sql::create([
            'code' => 'HDKR' . Str::random(5). date('Ymd'),
            'user_id' => $this->map_param_order["user_id"],
            'shipping_fullname' => $this->map_param_order["shipping_fullname"],
            'shipping_phone' => $this->map_param_order["shipping_phone"],
            'shipping_address' => $this->map_param_order["shipping_address"],
            'payment_method' => $this->map_param_order["payment_method"],
            'temp_price' =>$this->map_param_order["temp_price"],
            'total_price' => $this->map_param_order["total_price"],
            'ship_price' => $this->map_param_order["ship_price"],
            'notes' => $this->map_param_order["notes"],
            'promotion_id' => $this->map_param_order["id_promotion"] == 0 ? null : $this->map_param_order["id_promotion"],
            'status_id' => 1,
            'created_at' =>  $time,
            'updated_at' =>  $time
        ]);

        $list = json_decode($this->list_product);

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

            $this->updateStockProduct($item->product->id,$item->quantity);
        }

        $this->createPushNoti($order->id);

        $this->updateLimitPromotion($this->map_param_order["id_promotion"],);
    }

    private function updateLimitPromotion($idPromotion){
        if($idPromotion == 0) return;

       $promotion_sql = new TablePromotion();

       $promotion = $promotion_sql::find($idPromotion);

       $promotion->update(["limit" => $promotion->limit - 1]);
    }

    private function updateStockProduct($idProduct, $quantity){

       $product_detail_sql = new TableProductDetail();

       $product = $product_detail_sql::find($idProduct);

       $product->update(["stock" => $product->stock - $quantity]);
    }

    private function createPushNoti($order_id){
        $noti_sql = TableNotification::create([
            "title" => "Đơn hàng mới",
            "subtitle" => "Có đơn hàng mới vừa đặt từ người dùng ".Auth::user()->fullName,
            'user_id'=> Auth::id(),
            'order_id' => $order_id,
            'is_read' => 1,
            "type" => "admin",
            'created_at' =>date('Y-m-d H:i-s'),
            'updated_at' =>date('Y-m-d H:i-s'),
        ]);

        $data = [
            'title' =>  $noti_sql->title,
            'subtitle' =>$noti_sql->subtitle,
        ];
        
        $this->pusher('payment-channel','payment-event',$data);
    }

    private function pusher($channel,$event,$data){
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );

        // Phát sóng sự kiện `chat-message` trên kênh `chat-channel` với dữ liệu chat đã lấy được từ request
        $pusher->trigger($channel, $event, $data);
    }

}
