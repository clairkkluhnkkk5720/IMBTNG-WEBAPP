@extends('front.layouts.primary')

@section('page-title', $event->title)

@section('contents')

	<h3 class="text-uppercase section-title">{{ $event->title }}</h3>

	<article class="single-event">
		<div class="event-banner">
			<img src="/uploads/events/banners/{{ $event->banner }}">
		</div><!-- .event-banner -->
		<div class="event-content">
			<br>
			<p>{{ $event->details }}</p>
			<br>
			<p><strong>Live at:</strong> {{ $event->live_at->toDayDateTimeString() }}</p>
			<br>
			<h4 style="font-weight: bold;" class="text-uppercase">Athletes / Team:</h4>
			<ul>
				@foreach ($players as $player)
					<li>{{ $player->name }}</li>
				@endforeach
			</ul>
			<br>
			@if ($event->winner)
				<h4 style="font-weight: bold;" class="text-uppercase">Winner:</h4>
				<ul>
					<li>{{ $event->winner->name }}</li>
				</ul>
				<br>
			@endif
			@if (!$event->live_at <= \Carbon\Carbon::now())
				<a class="cta-button" href="#" data-event-id="{{ $event->id }}">PLACE A BET</a>
			@endif
			<br><br><br>
		</div>
	</article><!-- .single-event -->

	@include('front.partials.modals._place-bet')

@endsection