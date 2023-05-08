<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableOrderStatus extends Model
{
    use HasFactory;

    protected $table = "table_order_status";


    protected $fillable = [
        'name',
        'class_order',
        'created_at',
        'updated_at',
    ];
}
