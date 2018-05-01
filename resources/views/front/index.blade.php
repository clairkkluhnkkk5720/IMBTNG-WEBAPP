@extends('front.layouts.primary')

@section('page-title', 'Home')

@section('contents')

	<div class="row">
		<div class="col-md-12">
			<h2 class="text-uppercase section-title">Today's Events:</h2>
		</div>
		<div class="col-md-6 col-lg-5" hidden>
			<form id="search" action="/search">
				<input type="search" class="form-control" name="q" placeholder="Search in Sports" required>
				<button type="submit">
					<i class="fa fa-search"></i>
				</button>
			</form><!-- #search -->
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="slider-container">
		<div class="events-slider">
			@foreach ($events['todays'] as $item)
				@include('front/partials/_single-slider-event', compact('item'))
			@endforeach
		</div><!-- .events-slider -->
	</div><!-- .slider-container -->

	<h3 class="text-uppercase section-title">Upcoming Game Lines:</h3>

	<div class="carousel-container">
		<div class="events-carousel owl-carousel">
			@foreach ($events['upcoming'] as $item)
				<article class="events-carousel-item text-center text-uppercase">
					<figure>
						<img src="/uploads/events/thumbs/{{ $item->banner }}" alt="{{ $item->title }}">
						<figcaption>
							<?php
								$dateArray =  explode(', ', $item->live_at->toDayDateTimeString());
								$timeArray = explode(' ', $dateArray[2]);

								$str = $dateArray[1] . ' ' . $timeArray[1] . ' ' . $timeArray[2];

								echo $str;
							?>
						</figcaption>
					</figure>
					<ul>
						<li>
							<a href="{{ route('events.show', $item->slug) }}" title="{{ $item->title }}">{{ $item->title }}</a>
						</li>
						<li>
							<a href="#">Rooster X</a>
							&nbsp;<em>vs</em>&nbsp;
							<a href="#">Rooster Y</a>
						</li>
					</ul>
					<footer>
						<a href="#" class="cta-button" data-event-id="{{ $item->id }}">Place a bet</a>
					</footer>
				</article><!-- .events-carousel-item -->
			@endforeach
		</div><!-- .events-carousel -->
	</div><!-- .carousel-container -->

@endsection