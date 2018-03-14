<?php

use App\Models\Game;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = Game::latest()->get();

        foreach ($games as $index => $game) {

        	if ($game->name == 'Football' or $game->name == 'Baseball') {
        		$type     = 1;
        		$typeName = 'Team';
        	} else {
        		$type     = 0;
        		$typeName = 'Athlete';
        	}

            $total = $index + 1;

            for ($i = 1; $i < 5; $i++) {
                $game->players()->create([
                    'name' => "{$game->name} {$typeName} {$i}",
                    'type' => $type,
                ]);
            }

        	// $game->players()->createMany([
        	// 	[
        	// 		'name' => "{$game->name} {$typeName} {$total}",
        	// 		'type' => $type,
        	// 	],
        	// 	[
        	// 		'name' => "{$game->name} {$typeName} {$total}",
        	// 		'type' => $type,
        	// 	],
        	// 	[
        	// 		'name' => "{$game->name} {$typeName} {$total}",
        	// 		'type' => $type,
        	// 	],
        	// 	[
        	// 		'name' => "{$game->name} {$typeName} {$total}",
        	// 		'type' => $type,
        	// 	],
        	// ]);
        }
    }
}
