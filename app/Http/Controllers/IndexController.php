<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('guest');
    }

    public function __invoke ()
    {
    	$games = Game::orderBy('name')->limit(4)->get();

    	return view('pages.index', compact('games'));
    }
}
