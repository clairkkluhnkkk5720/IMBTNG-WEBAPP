<?php

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;

        $admin->firstname = "John";
        $admin->lastname  = 'Doe';
        $admin->email     = 'john@imbting.com';
        $admin->username  = 'johndoe';
        $admin->phone     = '01612121212';
        $admin->password  = Hash::make('secret');

        $admin->save();

        $admin->roles()->attach( Role::first() );
    }
}
