<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(EventCategoriesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(GamesTableSeeder::class);
        // $this->call(PlayersTableSeeder::class);
        // $this->call(EventsTableSeeder::class);
        // $this->call(BetsTableSeeder::class);
    }
}
