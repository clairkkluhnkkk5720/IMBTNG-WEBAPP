@extends('layouts.app')

@section('page-title', 'Place Bet')

@section('contents')

	<section class="main-content-section section-padding" style="padding-top: 50px">
		<div class="container">
			<img src="/uploads/events/banners/{{ $event->banner }}" style="width: 100%">
			<br><br>
			<h2>{{ $event->title }}</h2><br>
			<p>ID : <strong>E00{{$event->id}}</strong></p>
			<p>{{ $event->details }}</p>
			<p>Live at : <strong>{{ $event->live_at->toDayDateTimeString() }}</strong></p><br>
			@if ($event->winner_id)
				<p>Status: <strong>Ended</strong></p>
				<p>Winner: <strong>{{ $event->winner()->first()->name }}</strong></p>
				<p>Participants: </p>

				<ul>
					<?php 
						if ($event->event_category_id ==1) {
							$data = $event->athletes;
						} else {
							$data = $event->teams;
						}
					?>
					@foreach ($data as $item)
						<li>{{ $item->name }}</li>
					@endforeach
				</ul>
			@else
				<form class="form-horizontal" method="POST" action="{{ route('bets.place.post', $event->slug) }}">
					<div class="form-group">
						<h4>{{ $event->event_category_id == 1 ? 'Athletes' : 'Teams' }}</h4><br>
						@foreach ($data as $item)
							<label>
								<input type="radio" name="player_id" value="{{ $item->id }}" required>
								&nbsp;&nbsp;&nbsp;&nbsp; {{ $item->name }}
							</label><br>
						@endforeach
					</div>

					<div class="form-group">
						<input type="number" name="amount" class="form-control" max="{{ auth()->user()->available() }}" min="1" required placeholder="Amount">
					</div>

					{{ csrf_field() }}
					<button type="submit">Place Bet</button>
				</form>
			@endif
		</div>
	</section>

@endsection