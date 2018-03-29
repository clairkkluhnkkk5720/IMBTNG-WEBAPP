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

    public function scopeVerified ($query)
    {
        return $query->where('e_c', null);
    }

    public function scopeUnverified ($query)
    {
        return $query->where('e_c', '!=', null);
    }

    public function isVerified()
    {
        return !$this->e_c;
    }

    public function debit ()
    {
        return $this->transactions()->where('type', 0)->sum('amount');
    }

    public function credit ()
    {
        return $this->transactions()->where('type', 1)->sum('amount');
    }

    public function balance ()
    {
        return $this->credit() - $this->debit();
    }

    public function risked ()
    {
        return pendingBets($this->bets)->sum('amount');
    }

    public function available ()
    {
        return $this->balance() - $this->risked();
    }
}
