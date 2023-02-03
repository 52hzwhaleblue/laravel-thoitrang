<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableOrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order',
        'id_product',
        'photo',
        'name',
        'code',
        'color',
        'size',
        'regular_price',
        'sale_price',
        'quantity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'regular_price' => 'double',
        'sale_price' => 'double',
    ];

    public function idOrder()
    {
        return $this->belongsTo(TableOrder::class);
    }

    public function idProduct()
    {
        return $this->belongsTo(TableProduct::class);
    }
}
