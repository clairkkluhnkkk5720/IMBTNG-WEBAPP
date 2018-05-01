<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function getPlayers ($id)
    {
    	if (!auth()->check()) {
    		return response()->json(['error' => 'Unauthenticated.'], 401);
    	}

    	$event = Event::findOrFail($id);

    	if ($event->event_category_id == 1) {
    		$query = $event->athletes();
    	} else {
    		$query = $event->teams();
    	}

    	$players = $query->get();

    	return [
    		'event'   => $event,
    		'type'    => $event->event_category_id,
    		'players' => $players,
    	];
    }

    public function show ($slug)
    {
        $event   = Event::where('slug', $slug)->firstOrFail();
        $players = $event->players;
        $game    = $event->game;

        return view('front.event', compact(
            'event', 'players', 'game'
        ));
    }
}
