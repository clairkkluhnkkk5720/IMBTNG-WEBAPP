<div class="events-slider-item" style="background-image: url('/uploads/events/banners/{{ $item->banner }}');">
	<div class="inner text-center">
		<div class="item-contents">
			<h3 class="text-uppercase">
				<a href="{{ route('events.show', $item->slug) }}" style="color: #fff;">{{ $item->title }}</a>
			</h3>
			<p>Starts In<br><span class="slider-clock" data-live-at="{{ $item->live_at }}"></span></p>
			<!-- <a href="#" class="button red">Watch Live</a> -->
			@if ($item->winner_id)
				<a href="{{ route('events.show', $item->slug) }}" class="cta-button">View Result</a>
			@elseif ($item->live_link)
				<a href="{{ route('events.show', $item->slug) }}" class="cta-button">Watch Live</a>
			@else
				<a href="#" class="cta-button" data-event-id="{{ $item->id }}">Place a Bet</a>
			@endif
		</div>
	</div>
</div><!-- .events-slider-item -->