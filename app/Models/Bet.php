<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
	protected $fillable = [
		'user_id', 'player_id', 'event_id', 'amount',
	];

    public function user ()
    {
    	return $this->belongsTo(User::class);
    }

    public function event ()
    {
    	return $this->belongsTo(Event::class);
    }

    public function player ()
    {
    	return $this->belongsTo(Player::class);
    }

    public function transaction ()
    {
        return $this->hasMany(Transaction::class);
    }
}
