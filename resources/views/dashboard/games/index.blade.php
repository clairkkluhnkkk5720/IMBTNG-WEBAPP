@extends('dashboard.layouts.app')

@section('title', 'Games')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">All Games</h3>
			<div class="box-tools">
				<a href="{{ route('dashboard.games.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Game</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Slug</th>
						<th class="text-right">Actions</th>
					</tr>
					@each('dashboard.games.partials._single-game', $games, 'game')
				</table>
			</div>
		</div>
		<!-- /.box-body -->
		@if ($games->total() > 15)
			<div class="box-footer clearfix">
				{{ $games->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection