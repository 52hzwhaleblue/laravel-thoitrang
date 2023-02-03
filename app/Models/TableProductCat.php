<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableProductCat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_list',
        'content',
        'slug',
        'desc',
        'name',
        'photo',
        'options',
        'numb',
        'status',
        'type',
        'date_created',
        'date_updated',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'array',
    ];

    public function idList()
    {
        return $this->belongsTo(TableProductList::class);
    }
}
