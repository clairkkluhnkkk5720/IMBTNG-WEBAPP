<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bet;
use App\Models\Event;
use Illuminate\Http\Request;

class BetsController extends Controller
{
    public function placeBet (Request $request, $eventId)
    {
    	if (!auth()->check()) {
    		return response()->json(['error' => 'Unauthenticated.'], 401);
    	}

        $this->validateBetRequest($request);

        $event = Event::findOrFail($eventId);
        $user  = auth()->user();

    	$isEventValid     = $this->validateEvent($event);

    	if (!$isEventValid) {
    		$errorMessage = $event->winner_id ? 'Event already ended' : 'Event already started';

    		return response()->json([
    			'error' => $errorMessage
    		], 422);
    	}

        $hasEnoughBalance = $this->checkUserBalance($request);

        if (!$hasEnoughBalance) {
            $errorMessage = "You don't have enough balance.";

            return response()->json([
                'error' => $errorMessage
            ], 422);
        }

        $data = [];

        foreach ($request->player as $key => $value) {
            $data[] = [
                'event_id'  => $event->id,
                'player_id' => $key,
                'amount'    => $value,
            ];
        }

        $bets   = $user->bets()->createMany($data);

        $user->load('bets');
        $bets->load('event');
        $bets->load('player');

        $risked = $user->risked();

        return compact('bets', 'risked');
    }

    protected function checkUserBalance (Request $request)
    {
        $user    = auth()->user();
        $amount  = 0;
        $balance = $user->available();

        foreach ($request->player as $key => $value) {
            $amount += $value;
        }

        return $balance > $amount;
    }

    protected function validateBetRequest (Request $request)
    {
        $this->validate($request, [
            'player' => 'required|array|min:1',
        ]);
    }

    protected function validateEvent (Event $event)
    {
    	if ($event->winner_id) {
    		return !$event->winner_id;
    	}

    	return !($event->live_at <= Carbon::now());
    }
}
