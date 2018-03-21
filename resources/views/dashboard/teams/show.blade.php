@extends('dashboard.layouts.app')

@section('title', $team->name )

@section('contents')

	<div class="row">

		<div class="col-md-7 col-lg-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Team Information: {{ $team->name }}</h3>
				</div>

				<div class="box-body">
					<p>ID: <strong>{{ $team->id }}</strong></p>
					<p>Name: <strong>{{ $team->name }}</strong></p>
					<p>Slug: <strong>{{ $team->slug }}</strong></p>
					<p>Game: <a href="{{ route('dashboard.games.show', $game->slug) }}"><strong>{{ $game->name }}</strong></a></p>
					<p>Details: <strong>{{ $team->details }}</strong></p>
					<p>Created at: <strong>{{ $team->created_at->toFormattedDateString() }}</strong></p>
					<br>
					<p>Athletes:</p>
					<ul>
						@foreach ($athletes as $athlete)
							<li><a href="{{ route('dashboard.athletes.show', $athlete->slug) }}">{{ $athlete->name }}</a></li>
						@endforeach
					</ul>
				</div>

				<div class="box-footer">
					<div class="pull-right">
						<a href="{{ route('dashboard.teams.edit', $team->slug) }}" class="btn btn-primary btn-flat">Edit</a>
						<a href="#" data-toggle="modal" data-target="#team-{{ $team->slug }}-delete-modal" class="btn btn-danger btn-flat">Delete</a>
						@include('dashboard.teams.partials._modal-delete-team', compact('team'))
					</div>
				</div>
			</div>

		</div>

	</div>

@endsection