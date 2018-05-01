<ul class="game-links">
	@foreach ($games as $game)
		<li>
			<a href="{{ route('game.index', $game->slug) }}" style="padding-left: 10px">
				{{-- <img src="/img/icon-baseball.png" alt="{{ $game->name }}"> --}}
				{{ $game->name }}
			</a>
		</li>
	@endforeach
</ul>