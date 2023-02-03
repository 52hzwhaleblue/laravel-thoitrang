<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableColor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numb',
        'id_product',
        'photo',
        'name',
        'color',
        'type_show',
        'type',
        'regular_price',
        'sale_price',
        'discount',
        'status',
        'date_created',
        'date_updated',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'type_show' => 'integer',
        'regular_price' => 'double',
        'sale_price' => 'double',
        'discount' => 'double',
    ];

    public function idProduct()
    {
        return $this->belongsTo(TableProduct::class);
    }
}
