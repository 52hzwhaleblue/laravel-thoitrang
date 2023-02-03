<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product',
        'name',
        'type',
        'numb',
        'status',
        'date_created',
        'date_updated',
    ];

    public function idProduct()
    {
        return $this->belongsTo(TableProduct::class);
    }
}
