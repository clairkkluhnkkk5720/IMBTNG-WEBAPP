@extends('dashboard.layouts.app')

@section('title', 'Create Event' )

@section('contents')

	<div class="row">

		<div class="col-md-5">
			
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Event Information: </h3>
				</div>

				<div class="box-body">
					<p>Title: <strong>{{ request()->title }}</strong></p>
					<p>Slug: <strong>{{ request()->slug }}</strong></p>
					<p>Category: {{ $category->name }}</a></p>
					<p>Game: <a href="{{ route('dashboard.games.show', $game->slug) }}"><strong>{{ $game->name }}</strong></a></p>
					<p>Details: <strong>{{ request()->details }}</strong></p>
					<p>Live at: <strong>{{ request()->live_at }}</strong></p>
				</div>
			</div>

		</div>

		<div class="col-md-7">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Choose {{ $category->id == 1 ? 'Athletes' : 'Teams' }}: </h3>
				</div>

				<form action="{{ route('dashboard.events.store') }}" method="POST">
					<div class="box-body">
						@foreach ($data as $item)
							<div class="col-xs-6 col-sm-4 col-md-3">
								<div class="form-group">
									<label>
										<input type="checkbox" name="data[]" value="{{ $item->id }}" class="minimal" 
											@if (old('data') and is_array(old('data')) and in_array($item->id, old('data')) )
												checked
											@endif
										>
										&nbsp;&nbsp; {{ $item->name }}
									</label>
								</div>
							</div>
						@endforeach
					</div>
					<div class="box-footer">
						<input type="hidden" hidden name="title" value="{{ request()->title }}">
						<input type="hidden" hidden name="slug" value="{{ request()->slug }}">
						<input type="hidden" hidden name="game_id" value="{{ $game->id }}">
						<input type="hidden" hidden name="event_category_id" value="{{ $category->id }}">
						<input type="hidden" hidden name="live_at" value="{{ request()->live_at }}">
						<textarea hidden name="details">{{ request()->details }}</textarea>
						{{ csrf_field() }}
						<button class="btn btn-info btn-flat" type="submit">CREATE EVENT</button>
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