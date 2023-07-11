<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method static create(array $array)
 */
class TableProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'product_id',
        'name',
        'color',
        'size',
        'stock',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }

    public function product()
    {
        return $this->belongsTo(TableProduct::class);
    }
}
