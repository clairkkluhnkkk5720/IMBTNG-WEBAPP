@extends('dashboard.layouts.app')

@section('title', $event->name )

@section('contents')

	<div class="row">

		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">
						Event Images: {{ $event->title }}
					</h3>
				</div>

				<div class="box-body">
					<p>Thumb: @if (!$event->thumb) NULL @endif</p>
					@if ($event->thumb)
						<img class="img-responsive" src="/uploads/events/thumbs/{{ $event->thumb }}" alt="{{ $event->title }}">
					@endif
					<p>Banner: @if (!$event->banner) NULL @endif</p>
					@if ($event->banner)
						<img class="img-responsive" src="/uploads/events/banners/{{ $event->banner }}" alt="{{ $event->title }}">
					@endif
				</div>
			</div>
		</div>

		<div class="col-md-6">
			
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Event Information: {{ $event->title }}</h3>
				</div>

				<div class="box-body">
					<p>ID: <strong>{{ $event->id }}</strong></p>
					<p>Title: <strong>{{ $event->title }}</strong></p>
					<p>Slug: <strong>{{ $event->slug }}</strong></p>
					<p>Type: <strong>{{ $category->name }}</strong></p>
					<p>Game: <a href="{{ route('dashboard.games.show', $game->slug) }}"><strong>{{ $game->name }}</strong></a></p>
					<p>Details: <strong>{{ $event->details }}</strong></p>
					<p>Created at: <strong>{{ $event->created_at->toFormattedDateString() }}</strong></p>
					<p>Live Date: <strong>{{ $event->live_at->toDayDateTimeString() }}</strong></p>
					<br>
					<?php
						$str = $category->id == 1 ? 'Athletes' : 'Teams';
						$rtr = $category->id == 1 ? 'dashboard.athletes.show' : 'dashboard.teams.show';
					?>
					<p>{{ $str }} :</p>
					<ul>
						@foreach ($data as $item)
							<li><a href="{{ route($rtr, $item->slug) }}">{{ $item->name }}</a></li>
						@endforeach
					</ul>
				</div>

				<div class="box-footer">
					<div class="pull-right">
						{{-- <a href="{{ route('dashboard.events.edit', $event->slug) }}" class="btn btn-primary btn-flat">Edit</a> --}}
						<a href="#" data-toggle="modal" data-target="#event-{{ $event->slug }}-delete-modal" class="btn btn-danger btn-flat">Delete</a>
						@include('dashboard.events.partials._modal-delete-event', compact('event'))
					</div>
				</div>
			</div>

		</div>

	</div>

@endsection