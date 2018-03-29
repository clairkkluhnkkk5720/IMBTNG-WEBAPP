@extends('dashboard.layouts.app')

@section('title', 'Member')

@section('contents')

	@if ($user->trashed())
		@include('dashboard.members.partials._modal-unban-member', compact('user'))
	@else
		@include('dashboard.members.partials._modal-ban-member', compact('user'))
	@endif

	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<a href="{{ route('dashboard.members.transactions', $user->id) }}" class="info-box-icon bg-aqua"><i class="fa fa-usd"></i></a>

				<div class="info-box-content">
					<span class="info-box-text">Balance</span>
					<span class="info-box-number">
						<?php
							$debit = $transactions->where('type', '1')->sum('amount');
							$credit = $transactions->where('type', '0')->sum('amount');
						?>
						{{ $debit - $credit }} <small>(USD)</small>
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<a href="{{ route('dashboard.members.bets.winning', $user->id) }}" class="info-box-icon bg-green"><i class="fa fa-usd"></i></a>

				<div class="info-box-content">
					<span class="info-box-text">Winning Bets</span>
					<span class="info-box-number">
						<?php $winningBets = winningBets($bets); ?>
						{{ $winningBets->count() }} <small>({{ $winningBets->sum('amount') }} USD)</small>
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<a href="{{ route('dashboard.members.bets.losing', $user->id) }}" class="info-box-icon bg-yellow"><i class="fa fa-usd"></i></a>

				<div class="info-box-content">
					<span class="info-box-text">Losing Bets</span>
					<span class="info-box-number">
						<?php $losingBets = losingBets($bets); ?>
						{{ $losingBets->count() }} <small>({{ $losingBets->sum('amount') }} USD)</small>
					</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->


		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<a href="{{ route('dashboard.members.bets.index', $user->id) }}" class="info-box-icon bg-red"><i class="fa fa-usd"></i></a>

				<div class="info-box-content">
					<span class="info-box-text">Total Bets</span>
					<span class="info-box-number">{{ $bets->count() }}</span>
					<a href="{{ route('dashboard.members.bets.pending', $user->id) }}">
						<?php $pendingBets = pendingBets($bets); ?>
						{{ $pendingBets->count() }} Pending, <small>({{ $pendingBets->sum('amount') }} USD at Risk)</small>
					</a>
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
					<h3 class="box-title">Member Info:</h3>
				</div>
				<div class="box-body">
					<p>Firstname: <strong>{{ $user->firstname }}</strong></p>
					<p>Lastname: <strong>{{ $user->lastname }}</strong></p>
					<p>Username: <strong>{{ $user->username }}</strong></p>
					<p>Email: <strong>{{ $user->email }}</strong></p>
					<p>Phone: <strong>{{ $user->phone }}</strong></p>
					<p>Wallet Addres: <strong>{{ $user->wallet }}</strong></p>
					<p>Member From: <strong>{{ $user->created_at->toFormattedDateString() }}</strong></p>
				</div>
				<div class="box-footer">
					@if ($user->trashed())
						<a href="#" data-toggle="modal" data-target="#member-{{ $user->id }}-unban-modal" class="btn btn-danger btn-block btn-flat"><b>REMOVE BAN</b></a>
					@else
						<a href="#" data-toggle="modal" data-target="#member-{{ $user->id }}-ban-modal" class="btn btn-danger btn-block btn-flat"><b>BAN THIS MEMBER</b></a>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection