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
        $football->slug = 'football';
        $football->icon = 'far fa-futbol';
        $football->save();

        $baseball = new Game;
        $baseball->name = 'Baseball';
        $baseball->slug = 'baseball';
        $baseball->icon = 'fas fa-baseball-ball';
        $baseball->save();

        $golf = new Game;
        $golf->name = 'Golf';
        $golf->slug = 'golf';
        $golf->icon = 'fas fa-golf-ball';
        $golf->save();

        $race = new Game;
        $race->name = 'Chicken Race';
        $race->slug = 'chicken-race';
        $race->icon = 'fas fa-flag-checkered';
        $race->save();
    }
}
