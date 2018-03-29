<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('auth');
    }

    public function history ()
    {
        $bets = auth()->user()->bets()->latest()->with(['event.game'])->paginate(10);

    	return view('pages.history', compact('bets'));
    }

    public function deposit ()
    {
    	return view('pages.coming-soon');
    }

    public function cs ()
    {
        return view('pages.coming-soon');
    }
}
