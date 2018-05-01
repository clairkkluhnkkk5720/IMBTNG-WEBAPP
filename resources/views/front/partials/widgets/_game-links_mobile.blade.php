<div class="sidebar-widget game-links visible-xs visible-sm">
	<h2 class="sidebar-widget-title text-center text-uppercase">Games</h2>
	<ul>
		@foreach ($games as $game)
			<li><a href="{{ route('game.index', $game->slug) }}">{{ $game->name }}</a></li>
		@endforeach
	</ul>
</div>