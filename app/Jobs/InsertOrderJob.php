<?php

namespace App\Jobs;

use App\Models\TableOrder;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\TableOrderDetail;
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
            'total_price' =>$this->map_param_order["total_price"],
            'ship_price' => $this->map_param_order["ship_price"],
            'notes' => $this->map_param_order["notes"],
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
        }
    }

    public function getResult(){
        return $this->result;
    }
}
