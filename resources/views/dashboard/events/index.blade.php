@extends('dashboard.layouts.app')

@section('title', 'Events')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Events</h3>
			<div class="box-tools">
				<a href="{{ route('dashboard.events.create') }}" class="btn btn-primary btn-flat btn-sm" disabled title="Create Option will be done when Vimeo Live API is provided.">Create new Event</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>#ID</th>
						<th>Title</th>
						<th>Total Bets</th>
						<th>Status</th>
						<th>Live at</th>
						<th>Winner</th>
						<th class="text-right">Actions</th>
					</tr>
					@foreach ($events as $event)
						<tr>
							<td><a href="{{ route('dashboard.events.show', $event->id) }}">{{ $event->id }}</a></td>
							<td><a href="{{ route('dashboard.events.show', $event->id) }}">{{ $event->title }}</a></td>
							<td>{{ $event->bets->count() }} <small>({{ $event->bets->sum('amount') }} USD)</small></td>
							<td>{{ $event->winner ? 'Ended' : 'Upcoming' }}</td>
							<td>{{ $event->live_at }}</td>
							<td>{{ $event->winner ? $event->winner->name : '-' }}</td>
							<td class="text-right">
								<a href="{{ route('dashboard.events.show', $event->id) }}" title="View Event" class="btn btn-flat btn-xs btn-primary"><i class="fa fa-eye"></i></a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
		<!-- /.box-body -->
		@if ($events->total() > 15)
			<div class="box-footer clearfix">
				{{ $events->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection