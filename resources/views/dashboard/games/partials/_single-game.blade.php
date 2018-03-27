<tr>
	<td><a href="{{ route('dashboard.games.show', $game->slug) }}">{{ $game->id }}</a></td>
	<td><a href="{{ route('dashboard.games.show', $game->slug) }}">{{ $game->name }}</a></td>
	<td>{{ $game->slug }}</td>
	<td><i class="{{ $game->icon }}"></i></td>
	<td class="text-right">
		<a href="{{ route('dashboard.games.show', $game->slug) }}" class="btn btn-xs btn-success btn-flat" title="View Game">
			<i class="fa fa-eye"></i>
		</a>
		<a href="{{ route('dashboard.games.edit', $game->slug) }}" class="btn btn-xs btn-primary btn-flat" title="Edit Game">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="#" data-toggle="modal" data-target="#game-{{ $game->slug }}-delete-modal" class="btn btn-xs btn-danger btn-flat" title="Delete Game">
			<i class="fa fa-trash"></i>
		</a>
		@include('dashboard.games.partials._modal-delete-game', compact('game'))
	</td>
</tr>