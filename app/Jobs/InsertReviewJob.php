<?php

namespace App\Jobs;

use App\Models\TableOrderDetail;
use App\Models\TableReview;
use App\Models\TableReviewDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class InsertReviewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $userId;
    protected $orderId;
    protected $content;
    protected $star;
    protected $photos;



    public function __construct($userId, $orderId, $content, $star, $photos)
    {
        $this->userId = $userId;
        $this->orderId = $orderId;
        $this->content = $content;
        $this->star = $star;
        $this->photos = $photos;
    }
    
    public function handle()
    {   
        $review_sql  = new TableReview();

        $order_detail_sql  = new TableOrderDetail();

        $review_detail_sql  = new TableReviewDetail;


        $time = now();

        $products = $order_detail_sql
        ::where('order_id', $this->orderId)
        ->select('id', 'product_id')
        ->get();

        foreach ($products as $item) {
            $result = $review_sql::create([
                'user_id' => $this->userId,
                'order_id' => $this->orderId,
                'product_id' => $item->product_id,
                'content' => $this->content,
                'star' => $this->star,
                'status' => 1,
                'created_at' => $time,
                'updated_at' => $time,
            ]);

            foreach($this->photos as $item){
                $data = [
                    'review_id' => $result->id,
                    'photo' => $item,
                    'created_at' => $time,
                    'updated_at' => $time,
                ];
                $review_detail_sql::create($data);
            }
        } 

    }
}