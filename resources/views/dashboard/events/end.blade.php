@extends('dashboard.layouts.app')

@section('title', 'Create Event' )

@section('contents')

	<div class="row">

		<div class="col-md-7">
			<form action="{{ route('dashboard.events.end', $event->slug) }}" method="POST">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Choose Winner: </h3>
					</div>

					<div class="box-body">
						@foreach ($data as $item)
							<div class="col-xs-6 col-sm-4 col-md-3">
								<div class="form-group">
									<label>
										<input type="radio" name="winner_id" value="{{ $item->id }}" class="minimal" required>
										&nbsp;&nbsp; {{ $item->name }}
									</label>
								</div>
							</div>
						@endforeach
					</div>
					<div class="box-footer">
						{{ csrf_field() }}
						<button class="btn btn-info btn-flat" type="submit">END EVENT</button>
					</div>
				</div>
			</form>
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