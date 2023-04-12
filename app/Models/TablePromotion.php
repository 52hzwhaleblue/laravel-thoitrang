<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePromotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'desc',
        'discount_price',
        'litmit',
        'status',
        'created_at',
        'updated_at',
    ];
}
