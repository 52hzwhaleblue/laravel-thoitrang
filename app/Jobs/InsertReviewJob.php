<?php

namespace App\Jobs;

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



    public function __construct($userId, $orderId, $content, $star)
    {
        $this->userId = $userId;
        $this->orderId = $orderId;
        $this->content = $content;
        $this->star = $star;
    }
    
    public function handle()
    {   
        $db = new DB();

        $query_review = $db::table('table_reviews');

        $products = $db::table('table_order_details')
        ->where('order_id', $this->orderId)
        ->select('id', 'product_id')
        ->get();

        foreach ($products as $item) {
            $query_review->insert([
                'user_id' => $this->userId,
                'order_id' => $this->orderId,
                'product_id' => $item->id,
                'content' => $this->content,
                'star' => $this->star,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}
