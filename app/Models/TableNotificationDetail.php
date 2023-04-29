<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\TableNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableNotificationDetail extends Model
{
    use HasFactory;

    protected $table = "table_notification_detail";

    protected $fillable = [
        'user_id',
        'notification_id',
        'is_read',
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

    public function notifications(){
        return $this->belongsTo(TableNotification::class,'notification_id','id');
    }

    public function scopeIsRead($query,$userId)
    {
        return  $query->where('user_id', '=', $userId);
    }
}
