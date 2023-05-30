<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableOrder;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TablePromotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'product_id',
        'desc',
        'order_price_conditions',
        'discount_price',
        'limit',
        'end_date',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'end_date' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (is_null($model->code)) {
    //             $model->code = Str::random(10); // Thay đổi độ dài chuỗi theo yêu cầu
    //         }
    //     });
    // }

    public function product(){
        return $this->hasOne(TableProduct::class);
    }

    public function order()
    {
        return $this->hasOne(TableOrder::class,'promotion_id','id');
    }
}
