@extends('dashboard.layouts.app')

@section('title', 'All Members')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">All Members</h3>
			{{-- <div class="box-tools">
				<a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Admin</a>
			</div> --}}
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Username</th>
					<th>Email</th>
					<th>Member from</th>
					<th>Total Bets</th>
					<th>Bet (Win)</th>
					<th>Bet (Lose)</th>
					<th>Pending (Risked Amount)</th>
					<th>Balance</th>
					<th class="text-right">Actions</th>
				</tr>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at->toFormattedDateString() }}</td>
						<td>
							{{ $user->bets->count() }}
						</td>
						<td>
							<?php $winningBets = winningBets($user->bets); ?>
							{{ $winningBets->count() }}
							<small>
								({{ $winningBets->sum('amount') }} USD)
							</small>
						</td>
						<td>
							<?php $losingBets = losingBets($user->bets); ?>
							{{ $losingBets->count() }}
							<small>
								({{ $losingBets->sum('amount') }} USD)
							</small>
						</td>
						<td>
							<?php $pendingBets = pendingBets($user->bets); ?>
							<small>
								{{ $pendingBets->count() }} ({{ $pendingBets->sum('amount') }} USD)
							</small>
						</td>
						<td>
							<?php
								$debit = $user->transactions->where('type', 1)->sum('amount');
								$credit = $user->transactions->where('type', 0)->sum('amount');
							?>
							{{ $debit - $credit }} <small>USD</small>
						</td>
						<td class="text-right">
							<a href="{{ route('dashboard.members.show', $user->id) }}" class="btn btn-xs btn-flat btn-primary" title="View Member Profile"><i class="fa fa-eye"></i></a>
							<a href="#" data-toggle="modal" data-target="#member-{{ $user->id }}-ban-modal" class="btn btn-xs btn-flat btn-danger" title="Ban this member"><i class="fa fa-ban"></i></a>
							@include('dashboard.members.partials._modal-ban-member', compact('user'))
						</td>
					</tr>
				@endforeach
			</table>
		</div>
		@if ($users->total() > 15)
			<div class="box-footer clearfix">
				{{ $users->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection