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
        $events = Event::todays()->with('game')->get();

        return view('pages.home', compact('events'));
    }
}
