<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'date_created',
        'date_updated',
    ];
}
