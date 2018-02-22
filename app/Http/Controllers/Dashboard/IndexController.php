<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke ()
    {
    	$admin = $this->getAdmin();

    	return $admin;
    }

    protected function getAdmin ()
    {
    	return auth()->guard('admin')->user();
    }
}
