<?php

use App\Models\Game;
use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $football = new Game;
        $football->name = 'Football';
        $football->save();

        $baseball = new Game;
        $baseball->name = 'Baseball';
        $baseball->save();

        $golf = new Game;
        $golf->name = 'Golf';
        $golf->save();

        $race = new Game;
        $race->name = 'Race';
        $race->save();
    }
}
