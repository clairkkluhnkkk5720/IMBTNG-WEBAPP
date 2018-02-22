<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'details',
    ];

    public function permissions ()
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function admins ()
    {
    	return $this->belongsTomany(Admin::class);
    }
}
