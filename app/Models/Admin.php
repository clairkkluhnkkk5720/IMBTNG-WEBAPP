<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'username', 'phone', 'password', 'avatar',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles ()
    {
        return $this->belongsToMany(Role::class);
    }
}
