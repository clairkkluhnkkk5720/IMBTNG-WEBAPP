@extends('dashboard.layouts.app')

@section('title', $p_title)

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ $p_title }} of <a href="{{ route('dashboard.members.show', $user->id) }}">{{ $user->firstname }} {{ $user->lastname }}</a></h3>
			{{-- <div class="box-tools">
				<a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Admin</a>
			</div> --}}
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>Event</th>
						<th>Amount</th>
						<th>Player</th>
						<th>Bet Placed at</th>
						<th>Status</th>
					</tr>
					@foreach ($bets as $bet)
						<tr>
							<td>{{ $bet->event->title }}</td>
							<td>{{ $bet->amount }}</td>
							<td>{{ $bet->player->name }}</td>
							<td>{{ $bet->created_at }}</td>
							<td>{{ getBetStatus($bet) }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
		{{-- @if ($bets->total() > 15)
			<div class="box-footer clearfix">
				{{ $bets->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif --}}
	</div>
	<!-- /.box -->

@endsection