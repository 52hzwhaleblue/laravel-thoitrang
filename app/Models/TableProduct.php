<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableReview;
use Illuminate\Support\Str;
use App\Models\TableCategory;
use App\Models\TablePromotion;
use App\Models\TableOrderDetail;
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

    public function promotion(){
        return $this->belongsTo(TablePromotion::class);
    }

    public function productDetail()
    {
        return $this->hasMany(TableProductDetail::class,'product_id','id');
    }

    public function category()
    {
        return $this->belongsTo(TableCategory::class);
    }

    public function reviews(){
        return $this->hasMany(TableReview::class,'product_id','id');
    }

    public function orderDetail()
    {
        return $this->hasMany(TableOrderDetail::class, 'product_id','id');
    }

    public function scopePopular($query)
    {
        return $query->where('view', '>=', 200)
            ->whereIn('id', function ($query) {
                $query->select('product_id')
                    ->from('table_order_details')
                    ->groupBy('product_id')
                    ->havingRaw('SUM(quantity) > 3');
            });
    }

    public function scopeStock($query)
    {
        return $query->whereHas('productDetail', function ($query) {
            $query->where('stock', '>=', 1);
        });
    }
}
