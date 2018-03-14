<?php

use App\Models\Bet;

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

function winningBets ($bets)
{
	return $bets->filter(function ($value, $key) {
		return $value->player_id === $value->event->winner_id;
	});
}

function losingBets ($bets)
{
	return $bets->filter(function ($value, $key) {
		return $value->event->winner_id and $value->player_id !== $value->event->winner_id;
	});
}

function pendingBets ($bets)
{
	return $bets->filter(function ($value, $key) {
		return is_null($value->event->winner_id);
	});
}

function getBetStatus (Bet $bet)
{
	if (!$bet->event->winner_id and !$bet->transaction()->first()) {
		return 'Pending';
	} else if ($bet->event->winner_id === $bet->player_id) {
		return 'Won';
	} else {
		return 'Lost';
	}
}