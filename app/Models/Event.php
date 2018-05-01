<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function category ()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function teams ()
    {
        return $this->belongsToMany(Team::class);
    }

    public function athletes ()
    {
        return $this->belongsToMany(Athlete::class);
    }

    public function scopePrevious ($query)
    {
        return $query->where('winner_id', '!=', null);
    }

    public function scopeUpcoming ($query)
    {
        return $query->where(
            'winner_id', '=', null
        )->whereDate(
            'live_at', '>', Carbon::today()
        );
    }

    public function scopeLive ($query)
    {
        return $query->where([
            ['winner_id', '=', null],
            ['live_link', '!=', null],
        ]);
    }

    public function scopeTodays ($query)
    {
        return $query->whereDate(
            'live_at', Carbon::today()
        )->where('winner_id', null);
    }

    public function winner ()
    {
        if ($this->event_category_id == 1) {
            return $this->belongsTo(Athlete::class, 'winner_id');
        }

        return $this->belongsTo(Team::class, 'winner_id');
    }

    public function players ()
    {
        if ($this->event_category_id == 1) {
            return $this->belongsToMany(Athlete::class);
        }

        return $this->belongsToMany(Team::class);
    }
}
