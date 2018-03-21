@extends('dashboard.layouts.app')

@section('title', 'Update Team')

@section('contents')

	<div class="row">

		<div class="col-md-8 col-lg-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Update Team</h3>
				</div>

				<form action="{{ route('dashboard.teams.edit.finish', $team->slug) }}" method="POST" class="form-horizontal">
					<div class="box-body">

						<div class="form-group @if ($errors->has('name')) has-error @endif">
							<label for="name" class="col-sm-3 control-label">Team Name *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" placeholder="Name" required>
								@if ($errors->has('name'))
									<span class="help-block">{{ $errors->first('name') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('slug')) has-error @endif">
							<label for="slug" class="col-sm-3 control-label">Team Slug *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="slug" name="slug" value="{{ $team->slug }}" placeholder="Slug" required>
								@if ($errors->has('slug'))
									<span class="help-block">{{ $errors->first('slug') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('game_id')) has-error @endif">
							<label for="game_id" class="col-sm-3 control-label">Select Game *</label>
							<div class="col-sm-9">
								<select name="game_id" id="game_id" class="form-control" required>
									<option disabled @if (!old('game_id')) selected @endif>Select Game</option>
									@foreach ($games as $game)
										<option value="{{ $game->id }}" @if ($game->id == $team->game->id) selected @endif>{{ $game->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('game_id'))
									<span class="help-block">{{ $errors->first('game_id') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('details')) has-error @endif">
							<label for="details" class="col-sm-3 control-label">Team Details</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="details" name="details" placeholder="Details" rows="4">{{ $team->details }}</textarea>
								@if ($errors->has('details'))
									<span class="help-block">{{ $errors->first('details') }}</span>
								@endif
							</div>
						</div>

					</div>

					<div class="box-footer">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-success btn-flat pull-right">NEXT STEP</button>
					</div>
				</form>
			</div>

		</div>

	</div>

@endsection