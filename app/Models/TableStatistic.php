<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableStatistic extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_statistical',
        'order_date',
        'order_date',
        'sales',
        'profit',
        'quantity',
        'total_order',
    ];
}
