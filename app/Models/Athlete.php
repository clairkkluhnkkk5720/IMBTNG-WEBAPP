<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    protected $fillable = [
    	'name', 'details', 'image',
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
}
