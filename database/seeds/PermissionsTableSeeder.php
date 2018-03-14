<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
	protected $permissions = [
		'roles' => [
			'read'   => 'Can read or view Roles.',
			'create' => 'Can create new Roles.',
			'update' => 'Can update existing Roles.',
			'delete' => 'Can delete Roles',
		],

        'admins' => [
            'read' => 'Can read or view Admin profiles.',
            'create' => 'Can create new Admins.',
            'update' => 'Can update existing Admins',
            'delete' => 'Can delete admins',
        ],

        'members' => [
            'read'   => 'Can read or view Member profiles.',
            'ban'    => 'Can ban Members.',
            'unban'  => 'Can unban any banned Member.',
            'delete' => 'Can delete any banned Member.',
        ],

        'games' => [
            'read'   => 'Can Read or view Games.',
            'create' => 'Can create new Games.',
            'update' => 'Can update existing Games.',
            'delete' => 'Can delete games',
        ],

        'players' => [
            'read'   => 'Can Read or view Players.',
            'create' => 'Can create new Players.',
            'update' => 'Can update existing Players.',
            'delete' => 'Can delete Players',
        ],

        'events' => [
            'read'   => 'Can Read or view Events.',
            'create' => 'Can create new Events.',
            'update' => 'Can update existing Events.',
            'delete' => 'Can delete Events',
        ],

        'bets' => [
            'read'   => 'Can Read or view Bets.',
        ],
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $key => $data) {
        	foreach ($data as $name => $details) {
        		$permission = new Permission;

        		$permission->name    = "{$name}.{$key}";
        		$permission->details = $details;

        		$permission->save();
        	}
        }
    }
}
