<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TableProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'slug',
        'regular_price',
        'discount',
        'sale_price',
        'properties',
        'options',
        'desc',
        'content',
        'numb',
        'type',
        'view',
        'stock',
        'category_id',
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
        'regular_price' => 'double',
        'discount' => 'double',
        'sale_price' => 'double',
        'properties' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public function idList()
    {
        return $this->belongsTo(TableProductList::class);
    }

    public function idCat()
    {
        return $this->belongsTo(TableProductCat::class);
    }
}
