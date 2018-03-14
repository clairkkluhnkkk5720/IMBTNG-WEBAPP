<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'details', 'live_at', 'banner', 'thumb', 'game_id', 'winner_id',
    ];

    protected $dates = [
        'create_at', 'updated_at', 'live_at',
    ];

    public function game ()
    {
    	return $this->belongsTo(Game::class);
    }

    public function bets ()
    {
    	return $this->hasMany(Bet::class);
    }

    public function players ()
    {
    	return $this->belongsToMany(Player::class);
    }

    public function winner ()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }
}
