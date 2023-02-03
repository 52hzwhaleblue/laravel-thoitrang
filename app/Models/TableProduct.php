<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_list',
        'id_cat',
        'name',
        'photo',
        'options',
        'content',
        'desc',
        'slug',
        'code',
        'regular_price',
        'discount',
        'sale_price',
        'numb',
        'status',
        'type',
        'date_created',
        'date_updated',
        'view',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'regular_price' => 'double',
        'discount' => 'double',
        'sale_price' => 'double',
        'status' => 'array',
    ];

    public function idList()
    {
        return $this->belongsTo(TableProductList::class);
    }

    public function idCat()
    {
        return $this->belongsTo(TableProductCat::class);
    }
}
