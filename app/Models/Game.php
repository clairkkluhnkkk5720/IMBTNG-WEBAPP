<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $fillable = [
		'name', 'details', 'banner', 'thumb', 'icon',
	];

    public function events ()
    {
    	return $this->hasMany(Event::class);
    }

    public function teams ()
    {
        return $this->hasMany(Team::class);
    }

    public function athletes ()
    {
        return $this->hasMany(Athlete::class);
    }
}
