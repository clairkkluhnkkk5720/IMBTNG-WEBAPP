<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
     * Role Permissions many to many relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions ()
    {
    	return $this->belongsToMany(Permission::class);
    }

    /**
     * Role Admins many to many relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins ()
    {
    	return $this->belongsTomany(Admin::class);
    }
}
