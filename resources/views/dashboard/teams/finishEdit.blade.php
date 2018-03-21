@extends('dashboard.layouts.app')

@section('title', 'Create Team' )

@section('contents')

	<div class="row">

		<div class="col-md-5">
			
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Team Information: </h3>
				</div>

				<div class="box-body">
					<p>Name: <strong>{{ request()->name }}</strong></p>
					<p>Slug: <strong>{{ request()->slug }}</strong></p>
					<p>Game: <a href="{{ route('dashboard.games.show', $game->slug) }}"><strong>{{ $game->name }}</strong></a></p>
					<p>Details: <strong>{{ request()->details }}</strong></p>
				</div>
			</div>

		</div>

		<div class="col-md-7">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Choose Athletes: </h3>
				</div>

				<form action="{{ route('dashboard.teams.update', $team->slug) }}" method="POST">
					<div class="box-body">
						@foreach ($athletes as $athlete)
							<div class="col-xs-6 col-sm-4 col-md-3">
								<div class="form-group">
									<label>
										<input type="checkbox" name="athletes[]" value="{{ $athlete->id }}" class="minimal" 
											@if (in_array($athlete->id, $previous))
												checked
											@endif
										>
										&nbsp;&nbsp; {{ $athlete->name }}
									</label>
								</div>
							</div>
						@endforeach
					</div>
					<div class="box-footer">
						<input type="hidden" hidden name="name" value="{{ request()->name }}">
						<input type="hidden" hidden name="slug" value="{{ request()->slug }}">
						<input type="hidden" hidden name="game_id" value="{{ $game->id }}">
						<textarea hidden name="details">{{ request()->details }}</textarea>
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<button class="btn btn-info btn-flat" type="submit">UPDATE TEAM</button>
					</div>
				</form>
			</div>
		</div>

	</div>

@endsection

@section('styles')

	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/dashboard-assets/plugins/iCheck/all.css">

@endsection

@section('scripts')

	<!-- iCheck 1.0.1 -->
	<script src="/dashboard-assets/plugins/iCheck/icheck.min.js"></script>

	<script>
		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass   : 'iradio_minimal-blue'
		});
	</script>

@endsection