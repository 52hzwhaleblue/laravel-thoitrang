<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'options',
        'mastertool',
        'headjs',
        'bodyjs',
        'name',
        'addressvi',
        'addressen',
        'analytics',
    ];
}
