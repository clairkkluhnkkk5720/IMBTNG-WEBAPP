<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * Fillable columns
     * 
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'username', 'phone', 'password', 'wallet', 'avatar',
    ];

    /**
     * Hidden columns
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bets ()
    {
        return $this->hasMany(Bet::class);
    }

    public function transactions ()
    {
        return $this->hasMany(Transaction::class);
    }
}
