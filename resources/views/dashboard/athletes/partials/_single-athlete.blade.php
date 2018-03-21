<tr>
	<td><a href="{{ route('dashboard.athletes.show', $athlete->slug) }}">{{ $athlete->id }}</a></td>
	<td><a href="{{ route('dashboard.athletes.show', $athlete->slug) }}">{{ $athlete->name }}</a></td>
	<td>{{ $athlete->slug }}</td>
	<td><a href="{{ route('dashboard.games.show', $athlete->game->slug) }}">{{ $athlete->game->name }}</a></td>
	<td class="text-right">
		<a href="{{ route('dashboard.athletes.show', $athlete->slug) }}" class="btn btn-xs btn-success btn-flat" title="View athlete">
			<i class="fa fa-eye"></i>
		</a>
		<a href="{{ route('dashboard.athletes.edit', $athlete->slug) }}" class="btn btn-xs btn-primary btn-flat" title="Edit athlete">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="#" data-toggle="modal" data-target="#athlete-{{ $athlete->slug }}-delete-modal" class="btn btn-xs btn-danger btn-flat" title="Delete athlete">
			<i class="fa fa-trash"></i>
		</a>
		@include('dashboard.athletes.partials._modal-delete-athlete', compact('athlete'))
	</td>
</tr>