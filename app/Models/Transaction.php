<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'user_id', 'type', 'amount', 'bet_id', 'details',
    ];

    public function user ()
    {
    	return $this->belongsTo(User::class);
    }

    public function bet ()
    {
    	return $this->belongsTo(Bet::class);
    }
}
