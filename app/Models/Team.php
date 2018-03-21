<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
    	'name', 'details', 'image',
    ];

    public function athletes ()
    {
    	return $this->belongsToMany(Athlete::class);
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
