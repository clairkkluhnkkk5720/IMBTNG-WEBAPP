@extends('dashboard.layouts.app')

@section('title', $athlete->name )

@section('contents')

	<div class="row">

		<div class="col-md-8 col-lg-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Athlete Information: {{ $athlete->name }}</h3>
				</div>

				<div class="box-body">
					<p>ID: <strong>{{ $athlete->id }}</strong></p>
					<p>Name: <strong>{{ $athlete->name }}</strong></p>
					<p>Slug: <strong>{{ $athlete->slug }}</strong></p>
					<p>Game: <a href="{{ route('dashboard.games.show', $athlete->game->slug) }}"><strong>{{ $athlete->game->name }}</strong></a></p>
					<p>Details: <strong>{{ $athlete->details }}</strong></p>
					<p>Created at: <strong>{{ $athlete->created_at->toFormattedDateString() }}</strong></p>
				</div>

				<div class="box-footer">
					<div class="pull-right">
						<a href="{{ route('dashboard.athletes.edit', $athlete->slug) }}" class="btn btn-primary btn-flat">Edit</a>
						<a href="#" data-toggle="modal" data-target="#athlete-{{ $athlete->slug }}-delete-modal" class="btn btn-danger btn-flat">Delete</a>
						@include('dashboard.athletes.partials._modal-delete-athlete', compact('athlete'))
					</div>
				</div>
			</div>

		</div>

	</div>

@endsection