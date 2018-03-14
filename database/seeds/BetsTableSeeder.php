<?php

use App\Models\Bet;
use App\Models\User;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class BetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::latest()->get();
        $events = Event::latest()->get();

        foreach ($events as $event) {
        	$players = $event->players;
        	$total   = count($players);

        	$users->each(function ($user) use ($event, $total, $players) {
        		$user->bets()->create([
        			'event_id'  => $event->id,
        			'player_id' => $players[ rand(0, $total - 1) ]['id'],
        			'amount'    => rand(20, 100),
        		]);
        	});
        }

        Event::where('winner_id', '!=', 'null')->get()->each(function ($event) {
        	$event->bets->each(function ($bet) use ($event) {
        		if ($bet->player_id == $event->winner_id) {
        			$transaction = new Transaction;
        			$transaction->user_id = $bet->user_id;
        			$transaction->bet_id  = $bet->id;
        			$transaction->type    = 1;
        			$transaction->details = 'Bet won';
        			$transaction->amount  = $bet->amount;
                    $transaction->save();
        		} else {
        			$transaction = new Transaction;
        			$transaction->user_id = $bet->user_id;
        			$transaction->bet_id  = $bet->id;
        			$transaction->type    = 0;
        			$transaction->details = 'Bet lost';
        			$transaction->amount  = $bet->amount;
                    $transaction->save();
        		}
        	});
        });
    }
}
