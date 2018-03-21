<tr>
	<td><a href="{{ route('dashboard.teams.show', $team->slug) }}">{{ $team->id }}</a></td>
	<td><a href="{{ route('dashboard.teams.show', $team->slug) }}">{{ $team->name }}</a></td>
	<td>{{ $team->slug }}</td>
	<td><a href="{{ route('dashboard.games.show', $team->game->slug) }}">{{ $team->game->name }}</a></td>
	<td class="text-right">
		<a href="{{ route('dashboard.teams.show', $team->slug) }}" class="btn btn-xs btn-success btn-flat" title="View team">
			<i class="fa fa-eye"></i>
		</a>
		<a href="{{ route('dashboard.teams.edit', $team->slug) }}" class="btn btn-xs btn-primary btn-flat" title="Edit team">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="#" data-toggle="modal" data-target="#team-{{ $team->slug }}-delete-modal" class="btn btn-xs btn-danger btn-flat" title="Delete team">
			<i class="fa fa-trash"></i>
		</a>
		@include('dashboard.teams.partials._modal-delete-team', compact('team'))
	</td>
</tr>