<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bet;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke ()
    {
    	$events = Event::count();
    	$bets   = Bet::all();
    	$users  = User::count();

    	return view('dashboard.index', compact('events', 'users', 'bets'));
    }

    protected function getAdmin ()
    {
    	return auth()->guard('admin')->user();
    }
}
