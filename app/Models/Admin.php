<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\Admin\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * Fillable columns
     * 
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'password', 'avatar',
    ];

    /**
     * Hidden columns
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Admin Roles relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles ()
    {
        return $this->belongsToMany(Role::class);
    }
}
