<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_permission',
        'username',
        'password',
        'confirm_code',
        'avatar',
        'fullname',
        'phone',
        'email',
        'address',
        'gender',
        'login_session',
        'user_token',
        'lastlogin',
        'status',
        'role',
        'secret_key',
        'birthday',
        'numb',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gender' => 'integer',
        'role' => 'integer',
    ];
}
