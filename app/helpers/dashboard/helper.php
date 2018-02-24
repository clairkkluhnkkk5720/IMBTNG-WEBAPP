<?php

function admin ()
{
	return auth()->guard('admin')->user();
}

function currentRouteName ()
{
	return Route::currentRouteName();
}

function formatPermissionName ($string)
{
	$pieces = explode('.', $string);

	return ucwords( implode(' ', $pieces) );
}