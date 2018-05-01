<?php

$user = auth()->user();
$bets = $user->bets()->latest()->risked()->with('player', 'event')->get();

?>
<div class="sidebar-widget open-bets">
	<h2 class="sidebar-widget-title text-center text-uppercase">Current Open Bets</h2>
	<ul>
		@foreach ($bets as $bet)
			<li>
				<p><a href="{{ route('events.show', $bet->event->slug) }}" class="event-title" title="Event Title">{{ $bet->event->title }}</a></p>
				<p><a href="#" title="{{ $bet->player->name }}">{{ $bet->player->name }}</a> - ${{ $bet->amount }}</p>
			</li>
		@endforeach
		<li class="total">
			Total Risked: ${{ $bets->sum('amount') }}
		</li>
	</ul>
</div><!-- .sidebar-widget.open-bets -->