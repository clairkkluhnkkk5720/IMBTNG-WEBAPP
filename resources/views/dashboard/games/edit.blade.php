@extends('dashboard.layouts.app')

@section('title', 'Edit Game')

@section('contents')

	<div class="row">

		<div class="col-md-8 col-lg-6">
			
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Game</h3>
				</div>

				<form action="{{ route('dashboard.games.update', $game->slug) }}" method="POST" class="form-horizontal">
					<div class="box-body">

						<div class="form-group @if ($errors->has('name')) has-error @endif">
							<label for="name" class="col-sm-3 control-label">Game Name *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" value="{{ $game->name }}" placeholder="Name" required>
								@if ($errors->has('name'))
									<span class="help-block">{{ $errors->first('name') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('slug')) has-error @endif">
							<label for="slug" class="col-sm-3 control-label">Game Slug *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="slug" name="slug" value="{{ $game->slug }}" placeholder="Slug" required>
								@if ($errors->has('slug'))
									<span class="help-block">{{ $errors->first('slug') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('details')) has-error @endif">
							<label for="details" class="col-sm-3 control-label">Game Details</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="details" name="details" placeholder="Details" rows="4">{{ $game->details }}</textarea>
								@if ($errors->has('details'))
									<span class="help-block">{{ $errors->first('details') }}</span>
								@endif
							</div>
						</div>

					</div>

					<div class="box-footer">
						{{ method_field('PUT') }}
						{{ csrf_field() }}
						<button type="submit" class="btn btn-primary pull-right">UPDATE GAME</button>
					</div>
				</form>
			</div>

		</div>

	</div>

@endsection