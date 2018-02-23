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
