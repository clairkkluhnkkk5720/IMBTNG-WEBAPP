<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function __invoke ()
    {
        $events = [];

        $events['todays'] = Event::todays()->orderBy('live_at', 'desc')->with('game')->get();

        $events['upcoming'] = Event::upcoming()->orderBy('live_at', 'desc')->with('game')->get();

        return view('front.index', compact('events'));
    }
}
