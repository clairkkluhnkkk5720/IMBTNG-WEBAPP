<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create()->each(function ($user) {
	        // $u->posts()->save(factory(App\Post::class)->make());
	        $user->transactions()->create([
	        	'type' => 1,
	        	'amount' => rand(1200, 2500),
                'details' => 'Deposit',
	        ]);
	    });
    }
}
