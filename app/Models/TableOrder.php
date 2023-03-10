<?php

namespace App\Models;

use Carbon\Carbon;
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
        'order_payment',
        'temp_price',
        'total_price',
        'ship_price',
        'requirements',
        'notes',
        'status',
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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public function idUser()
    {
        return $this->belongsTo(TableUser::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(TableOrderStatus::class);
    }
}
