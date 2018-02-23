<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	/**
	 * Fillable columns
	 * 
	 * @var array
	 */
    protected $fillable = [
        'name', 'details',
    ];

    /**
     * Permission Roles many to many relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles ()
    {
    	return $this->belongsToMany(Role::class);
    }
}
