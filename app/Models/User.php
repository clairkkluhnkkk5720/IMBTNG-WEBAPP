<?php

namespace App\Models;

use App\Notifications\User\VerifyEmail;
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
        'name', 'email', 'username', 'phone', 'e_c', 'password', 'wallet',
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

    public function sendEmailVerifyNotification ($e_c)
    {
        $this->notify(new VerifyEmail($e_c));
    }
}
