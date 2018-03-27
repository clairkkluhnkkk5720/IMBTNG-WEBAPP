<?php

namespace App\Http\Controllers\Auth;

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
    	return view('pages.history');
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
