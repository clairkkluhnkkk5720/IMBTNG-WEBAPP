@extends('dashboard.layouts.app')

@section('title', 'Event')

@section('contents')

	{{-- @if ($user->trashed())
		@include('dashboard.members.partials._modal-unban-member', compact('user'))
	@else
		@include('dashboard.members.partials._modal-ban-member', compact('user'))
	@endif --}}

	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Live at</span>
					<span class="info-box-number">
						{{ $event->live_at->toDateTimeString() }}
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-signal"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Status</span>
					<span class="info-box-number">
						{{ $event->winner ? 'Ended' : 'Upcoming' }}
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-usd"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Total Bets</span>
					<span class="info-box-number">
						{{ $bets->count() }} ({{ $bets->sum('amount') }} USD)
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Event Info:</h3>
				</div>
				<div class="box-body">
					<p>Title: <strong>{{ $event->title }}</strong></p>
					<p>Details: <strong>{{ $event->details ? $event->details : 'NULL' }}</strong></p>
					<p>Athletes/Teams: </p>
					<ul>
						@foreach ($players as $player)
							<li><strong>{{ $player->name }}</strong> <small>({{ $bets->where('player_id', $player->id)->count() }} Bets, {{ $bets->where('player_id', $player->id)->sum('amount') }} USD)</small></li>
						@endforeach
					</ul>
					{{-- <p>Gmail: <strong>{{ $user->username }}</strong></p>
					<p>Email: <strong>{{ $user->email }}</strong></p>
					<p>Phone: <strong>{{ $user->phone }}</strong></p>
					<p>Wallet Addres: <strong>{{ $user->wallet }}</strong></p>
					<p>Member From: <strong>{{ $user->created_at->toFormattedDateString() }}</strong></p> --}}
				</div>
				{{-- <div class="box-footer">
					@if ($user->trashed())
						<a href="#" data-toggle="modal" data-target="#member-{{ $user->id }}-unban-modal" class="btn btn-danger btn-block btn-flat"><b>REMOVE BAN</b></a>
					@else
						<a href="#" data-toggle="modal" data-target="#member-{{ $user->id }}-ban-modal" class="btn btn-danger btn-block btn-flat"><b>BAN THIS MEMBER</b></a>
					@endif
				</div> --}}
			</div>
		</div>
	</div>

@endsection