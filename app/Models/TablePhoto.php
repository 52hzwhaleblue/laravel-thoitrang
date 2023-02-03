<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablePhoto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'content',
        'desc',
        'name',
        'link',
        'link_video',
        'options',
        'type',
        'act',
        'numb',
        'status',
        'date_created',
        'date_updated',
    ];
}
