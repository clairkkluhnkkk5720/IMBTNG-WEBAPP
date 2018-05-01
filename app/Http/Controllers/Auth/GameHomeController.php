<?php

namespace App\Http\Controllers\Auth;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameHomeController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('auth');
    }

    public function __invoke ($slug)
    {
    	$game = Game::where('slug', $slug)->firstOrFail();

    	$events = [];

    	$events['todays'] = $game->events()->todays()->with('game')->get();

        $events['upcoming'] = $game->events()->upcoming()->with('game')->get();

        return view('front.index', compact('events', 'game'));
    }
}
