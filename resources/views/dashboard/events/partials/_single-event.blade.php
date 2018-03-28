<tr>
	<td><a href="{{ route('dashboard.events.show', $event->slug) }}">{{ $event->id }}</a></td>
	<td><a href="{{ route('dashboard.events.show', $event->slug) }}">{{ $event->title }}</a></td>
	<td>{{ $event->slug }}</td>
	<td><a href="{{ route('dashboard.games.show', $event->game->slug) }}">{{ $event->game->name }}</a></td>
	<td>{{ $event->category->name }}</td>
	<td>{{ $event->live_at->toDayDateTimeString() }}</td>
	<td class="text-right">
		<a href="{{ route('dashboard.events.show', $event->slug) }}" class="btn btn-xs btn-success btn-flat" title="View event">
			<i class="fa fa-eye"></i>
		</a>
		{{-- <a href="{{ route('dashboard.events.edit', $event->slug) }}" class="btn btn-xs btn-primary btn-flat" title="Edit event">
			<i class="fa fa-pencil"></i>
		</a> --}}
		<a href="#" data-toggle="modal" data-target="#event-{{ $event->slug }}-delete-modal" class="btn btn-xs btn-danger btn-flat" title="Delete event">
			<i class="fa fa-trash"></i>
		</a>
		@include('dashboard.events.partials._modal-delete-event', compact('event'))
	</td>
</tr>