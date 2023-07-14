<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableOrder;
use App\Models\TableProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableOrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_detail__id',
        'color',
        'size',
        'quantity',
        'price',
        'photo',
        'created_at',
        'update_at',
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

    public function product(){
        return $this->belongsTo(TableProduct::class,'product_id','id');
    }

    public function orders()
    {
        return $this->belongsTo(TableOrder::class);
    }
}
