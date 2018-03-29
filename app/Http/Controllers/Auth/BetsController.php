<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bet;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BetsController extends Controller
{
    public function showForm ($slug)
    {
    	$event = $this->event($slug);

    	if ($event->event_category_id == 1) {
    		$data = $event->athletes;
    	} else {
    		$data = $event->teams;
    	}

    	return view('pages.place-bet', compact('event', 'data'));
    }

    protected function event ($slug)
    {
    	return Event::todays()->where('slug', $slug)->firstOrFail();
    }

    public function place (Request $request, $slug)
    {
    	$event = $this->event($slug);

    	$this->validateBet($request);

    	$user = auth()->user();

    	$bet = $user->bets()->create([
    		'event_id' => $event->id,
    		'amount'   => $request->amount,
    		'player_id' => $request->player_id,
    	]);

    	if ($bet and $bet instanceof Bet) {
    		return back()->with(
    			'global.success',
    			'You bet is successfully placed'
    		);
    	}

    	return back()->with(
    		'global.error',
    		'Something went wrong. Please try again later.'
    	)->withInput();
    }

    protected function validateBet (Request $request)
    {
    	$rules = [
    		'amount'    => 'required|numeric|min:1',
    		'player_id' => 'required|numeric',
    	];

    	$this->validate($request, $rules);
    }
}
