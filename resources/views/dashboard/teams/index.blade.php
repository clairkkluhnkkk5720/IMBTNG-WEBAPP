@extends('dashboard.layouts.app')

@section('title', 'Teams')

@section('contents')

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">All Teams</h3>
			<div class="box-tools">
				{{-- <a href="{{ route('dashboard.athletes.create') }}" class="btn btn-primary btn-flat btn-sm">Create new Athlete</a> --}}
				<form>
					<select class="form-control" name="game">
						<option value="">All</option>
						@foreach ($games as $game)
							<option value="{{ $game->slug }}" @if (request()->has('game') and request()->game == $game->slug) selected @endif>
								{{ $game->name }}
							</option>
						@endforeach
					</select>
				</form>
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
						<th>Game</th>
						<th class="text-right">Actions</th>
					</tr>
					@each('dashboard.teams.partials._single-team', $teams, 'team')
				</table>
			</div>
		</div>
		<!-- /.box-body -->
		@if ($teams->total() > 15)
			<div class="box-footer clearfix">
				{{ $teams->appends(request()->input())->links('vendor.pagination.default', ['parentClassName' => 'pagination-sm no-margin pull-right']) }}
			</div>
		@endif
	</div>
	<!-- /.box -->

@endsection

@section('scripts')
	
	<script type="text/javascript">
		
		$('select[name=game]').on('change', function (e) {
			$(this).closest('form').trigger('submit');
		});

	</script>

@endsection