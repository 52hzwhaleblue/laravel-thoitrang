<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numb',
        'id_user',
        'code',
        'fullname',
        'phone',
        'address',
        'email',
        'order_payment',
        'temp_price',
        'total_price',
        'city',
        'district',
        'ward',
        'ship_price',
        'requirements',
        'notes',
        'order_status',
        'date_created',
        'date_updated',
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
    ];

    public function idUser()
    {
        return $this->belongsTo(TableUser::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(TableOrderStatus::class);
    }
}
