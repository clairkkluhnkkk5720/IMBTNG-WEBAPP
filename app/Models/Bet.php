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

    public function transaction ()
    {
        return $this->hasMany(Transaction::class);
    }

    public function team ()
    {
        return $this->belongsTo(Team::class, 'player_id');
    }

    public function athlete ()
    {
        return $this->belongsTo(Athlete::class, 'player_id');
    }
}
