<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableStatic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'photo1',
        'options',
        'content',
        'desc',
        'name',
        'file_attach',
        'type',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'update_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $value, 'UTC')
            ->setTimezone('Asia/Ho_Chi_Minh')
            ->toDateTimeString();
    }
}
