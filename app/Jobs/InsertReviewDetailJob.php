<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class InsertReviewDetailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $reviewId;
    protected $photos;

    public function __construct($reviewId, $photos)
    {
        $this->reviewId = $reviewId;
        $this->photos = $photos;
    }

    public function handle()
    {
        $reviewDetails = array_map(function ($photo) {
            return [
                'review_id' => $this->reviewId,
                'photo' => $photo,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $this->photos);

        DB::table('table_review_detail')->insert($reviewDetails);
    }
}
