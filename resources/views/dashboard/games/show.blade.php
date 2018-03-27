@extends('dashboard.layouts.app')

@section('title', $game->name )

@section('contents')

	<div class="row">

		<div class="col-md-8 col-lg-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Game Information: {{ $game->name }}</h3>
				</div>

				<div class="box-body">
					<p>ID: <strong>{{ $game->id }}</strong></p>
					<p>Name: <strong>{{ $game->name }}</strong></p>
					<p>Slug: <strong>{{ $game->slug }}</strong></p>
					<p>Icon: <i class="{{ $game->icon }}"></i></p>
					<p>Details: <strong>{{ $game->details }}</strong></p>
					<p>Created at: <strong>{{ $game->created_at->toFormattedDateString() }}</strong></p>
				</div>

				<div class="box-footer">
					<div class="pull-right">
						<a href="{{ route('dashboard.games.edit', $game->slug) }}" class="btn btn-primary btn-flat">Edit</a>
						<a href="#" data-toggle="modal" data-target="#game-{{ $game->slug }}-delete-modal" class="btn btn-danger btn-flat">Delete</a>
						@include('dashboard.games.partials._modal-delete-game', compact('game'))
					</div>
				</div>
			</div>

		</div>

	</div>

@endsection