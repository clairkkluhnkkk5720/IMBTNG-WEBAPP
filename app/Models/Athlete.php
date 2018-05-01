<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $fillable = [
    	'name', 'details', 'image', 'game_id', 'slug',
    ];

    public function events ()
    {
    	return $this->belongsToMany(Event::class);
    }

    public function teams ()
    {
    	return $this->belongsToMany(Team::class);
    }

    public function game ()
    {
    	return $this->belongsTo(Game::class);
    }

    public function bets ()
    {
        return $this->hasMany(Bet::class, 'player_id');
    }
}
