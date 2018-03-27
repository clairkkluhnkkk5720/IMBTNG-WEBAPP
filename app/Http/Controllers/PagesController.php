<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct ()
    {
    	$this->middleware('guest');
    }

    public function about ()
    {
    	return view('pages.coming-soon-2');
    }

    public function cs ()
    {
    	return view('pages.coming-soon-2');
    }
}
