<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $fillable = [
		'name', 'details', 'banner',
	];

    public function events ()
    {
    	return $this->hasMany(Event::class);
    }

    public function players ()
    {
    	return $this->hasMany(Player::class);
    }
}
