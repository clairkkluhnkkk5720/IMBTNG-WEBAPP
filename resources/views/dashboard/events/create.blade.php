@extends('dashboard.layouts.app')

@section('title', 'Create New Event')

@section('contents')

	<div class="row">

		<div class="col-md-8 col-lg-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Create New Event</h3>
				</div>

				<form action="{{ route('dashboard.events.create.finish') }}" method="POST" class="form-horizontal">
					<div class="box-body">

						<div class="form-group @if ($errors->has('title')) has-error @endif">
							<label for="title" class="col-sm-3 control-label">Event Title *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title" required>
								@if ($errors->has('title'))
									<span class="help-block">{{ $errors->first('title') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('slug')) has-error @endif">
							<label for="slug" class="col-sm-3 control-label">Event Slug *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Slug" required>
								@if ($errors->has('slug'))
									<span class="help-block">{{ $errors->first('slug') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('event_category_id')) has-error @endif">
							<label for="event_category_id" class="col-sm-3 control-label">Select Category *</label>
							<div class="col-sm-9">
								<select name="event_category_id" id="event_category_id" class="form-control" required>
									<option disabled @if (!old('event_category_id')) selected @endif>Select Category</option>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}" @if ($category->id == old('event_category_id')) selected @endif>
											{{ $category->name }}
										</option>
									@endforeach
								</select>
								@if ($errors->has('event_category_id'))
									<span class="help-block">{{ $errors->first('event_category_id') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('game_id')) has-error @endif">
							<label for="game_id" class="col-sm-3 control-label">Select Game *</label>
							<div class="col-sm-9">
								<select name="game_id" id="game_id" class="form-control" required>
									<option disabled @if (!old('game_id')) selected @endif>Select Game</option>
									@foreach ($games as $game)
										<option value="{{ $game->id }}" @if ($game->id == old('game_id')) selected @endif>
											{{ $game->name }}
										</option>
									@endforeach
								</select>
								@if ($errors->has('game_id'))
									<span class="help-block">{{ $errors->first('game_id') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('live_at')) has-error @endif">
							<label for="live_at" class="col-sm-3 control-label">Date *</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" name="live_at" id="live_at" value="{{ old('live_at') }}" min="{{ explode(' ', Carbon\Carbon::tomorrow())[0] }}" required>
								@if ($errors->has('live_at'))
									<span class="help-block">{{ $errors->first('live_at') }}</span>
								@endif
							</div>
						</div>

						<div class="form-group @if ($errors->has('details')) has-error @endif">
							<label for="details" class="col-sm-3 control-label">Event Details</label>
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
						<button type="submit" class="btn btn-success btn-flat pull-right">NEXT STEP</button>
					</div>
				</form>
			</div>

		</div>

	</div>

@endsection