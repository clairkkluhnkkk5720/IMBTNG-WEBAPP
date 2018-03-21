@extends('dashboard.layouts.app')

@section('title', 'All Bets')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Bets</h3>
			{{-- <div class="box-tools">
				<a href="{{ route('dashboard.events.create') }}" class="btn btn-primary btn-flat btn-sm" disabled title="Create Option will be done when Vimeo Live API is provided.">Create new Event</a>
			</div> --}}
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>#ID</th>
						<th>Event</th>
						<th>Athlete/Team</th>
						<th>User</th>
						<th>Amount</th>
						<th>Status</th>
					</tr>
					@foreach ($bets as $bet)
						<tr>
							<td>{{ $bet->id }}</td>
							<td><a href="{{ route('dashboard.events.show', $bet->event->id) }}">{{ $bet->event->title }}</a></td>
							<td>{{ $bet->player->name }}</td>
							<td><a href="{{ route('dashboard.members.show', $bet->user->id) }}">{{ $bet->user->firstname }} {{ $bet->user->lastname }}</a></td>
							<td>{{ $bet->amount }} <small>USD</small></td>
							<td>{{ getBetStatus($bet) }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
		<!-- /.box-body -->
		@if ($bets->total() > 15)
			<div class="box-footer clearfix">
				{{ $bets->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection