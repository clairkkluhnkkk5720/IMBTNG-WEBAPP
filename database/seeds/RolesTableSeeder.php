<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;

        $role->name = "Super Admin";
        $role->details = "Super Admin of the system, has access to all features of the admin panel";

        $role->save();

        $role->permissions()->attach(Permission::all());
    }
}
