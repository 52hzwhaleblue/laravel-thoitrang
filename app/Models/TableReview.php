<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\TableOrder;
use App\Models\TableProduct;
use App\Models\TableReviewDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'content',
        'star',
        'photos',
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(TableProduct::class,'product_id','id');
    }

    public function images(){
        return $this->hasMany(TableReviewDetail::class,'review_id','id');
    }

    public function order(){
        return $this->belongsTo(TableOrder::class);
    }
}
