<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'username', 'phone', 'password', 'wallet', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
