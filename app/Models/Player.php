<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'details', 'type', 'avatar', 'game_id',
    ];

    public function bets ()
    {
    	return $this->hasMany(Bet::class);
    }

    public function events ()
    {
    	return $this->belongsToMany(Event::class);
    }

    public function game ()
    {
    	return $this->belongsTo(Game::class);
    }
}
