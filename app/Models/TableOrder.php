<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableReview;
use App\Models\TablePromotion;
use App\Models\TableOrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'user_id',
        'shipping_fullname',
        'shipping_phone',
        'shipping_address',
        'payment_method',
        'temp_price',
        'total_price',
        'ship_price',
        'requirements',
        'notes',
        'status_id',
        'promotion_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'temp_price' => 'double',
        'total_price' => 'double',
        'ship_price' => 'double',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

//    public function getCreatedAtAttribute($value)
//    {
//        return Carbon::createFromFormat('Y-m-d', $value, 'UTC')
//            ->setTimezone('Asia/Ho_Chi_Minh')
//            ->toDateTimeString();
//    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(TableOrderStatus::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(TableOrderDetail::class,'order_id','id');
    }

    public function review()
    {
        return $this->hasOne(TableReview::class,'order_id','id');
    }

    public function promotion()
    {
        return $this->belongsTo(TablePromotion::class,'promotion_id','id');
    }


}
