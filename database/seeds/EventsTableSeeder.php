<?php

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
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
            $total = $index + 1;

        	$game->events()->createMany([
        		[
        			'title' => "{$game->name} Event {$total}",
        			'live_at' => Carbon::now()->subDay(1),
        			'winner_id'  => $game->players()->first()->id,
        		],
        		[
        			'title' => "{$game->name} Event {$total}",
        			'live_at' => Carbon::now()->addDay(1),
        		],
        	]);
        }

        $events = Event::latest()->get();

        foreach ($events as $index => $event) {
        	$eventGame = $event->game;

        	if ($eventGame->name == 'Football' or $eventGame == 'Baseball') {
        		$gamePlayers = $eventGame->players()->limit(2)->get();
        	} else {
        		$gamePlayers = $eventGame->players;
        	}

        	$event->players()->attach($gamePlayers);
        }
    }
}
