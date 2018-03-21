@extends('dashboard.layouts.app')

@section('title', 'Create New Game')

@section('contents')

	<div class="row">

		<div class="col-md-8 col-lg-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Create New Game</h3>
				</div>

				<form action="{{ route('dashboard.games.store') }}" method="POST" class="form-horizontal">
					<div class="box-body">

						<div class="form-group @if ($errors->has('name')) has-error @endif">
							<label for="name" class="col-sm-3 control-label">Game Name *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required>
								@if ($errors->has('name'))
									<span class="help-block">{{ $errors->first('name') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('slug')) has-error @endif">
							<label for="slug" class="col-sm-3 control-label">Game Slug *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Slug" required>
								@if ($errors->has('slug'))
									<span class="help-block">{{ $errors->first('slug') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('details')) has-error @endif">
							<label for="details" class="col-sm-3 control-label">Game Details</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="details" name="details" placeholder="Details" rows="4">{{ old('details') }}</textarea>
								@if ($errors->has('details'))
									<span class="help-block">{{ $errors->first('details') }}</span>
								@endif
							</div>
						</div>

					</div>

					<div class="box-footer">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-success pull-right">CREATE GAME</button>
					</div>
				</form>
			</div>

		</div>

	</div>

@endsection