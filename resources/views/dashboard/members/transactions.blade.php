@extends('dashboard.layouts.app')

@section('title', 'Transactions')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Transactions of <a href="{{ route('dashboard.members.show', $user->id) }}">{{ $user->firstname }} {{ $user->lastname }}</a></h3>
			{{-- <div class="box-tools">
				<a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Admin</a>
			</div> --}}
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered">
				<tr>
					<th>#ID</th>
					<th>Member</th>
					<th>Type</th>
					<th>Amount</th>
					<th>Details</th>
				</tr>
				@foreach ($transactions as $t)
					<tr>
						<td>{{ $t->id }}</td>
						<td>{{ $t->user->firstname }} {{ $t->user->lastname }}</td>
						<td>{{ $t->type ? 'Credit' : 'Debit' }}</td>
						<td>{{ $t->amount }} USD</td>
						<td>{{ $t->details }}</td>
					</tr>
				@endforeach
			</table>
		</div>
		{{-- @if ($bets->total() > 15)
			<div class="box-footer clearfix">
				{{ $bets->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif --}}
		<div class="box-footer clearfix">
			<h4>Balance: <strong>{{ $transactions->where('type', 1)->sum('amount') - $transactions->where('type', 0)->sum('amount') }} USD</strong></h4>
		</div>
	</div>
	<!-- /.box -->

@endsection