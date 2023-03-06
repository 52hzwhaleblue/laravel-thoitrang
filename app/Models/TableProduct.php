<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableCategory;
use App\Models\TableProductDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'status' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public function productDetail()
    {
        return $this->hasMany(TableProductDetail::class,'product_id','id');
    }

    public function category()
    {
        return $this->belongsTo(TableCategory::class);
    }

}
