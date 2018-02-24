<?php

function admin ()
{
	return auth()->guard('admin')->user();
}

function currentRouteName ()
{
	return Route::currentRouteName();
}