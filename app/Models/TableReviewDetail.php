<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableReviewDetail extends Model
{
    use HasFactory;
    
    protected $table = "table_review_detail";

    protected $fillable = [
        'review_id',
        "photo",
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public  function review(){

        return $this->belongsTo(TableReview::class,'review_id','id');
        
    }
}
