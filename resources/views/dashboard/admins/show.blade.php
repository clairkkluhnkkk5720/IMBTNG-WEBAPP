@extends('dashboard.layouts.app')

@section('title', 'Admin')

@section('contents')

	@include('dashboard.admins.partials._modal-delete-admin', compact('admin'))

	<div class="row">
		<div class="col-lg-3 col-md-4">
			<div class="box box-danger">
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive img-circle" src="/dashboard-assets/dist/img/user4-128x128.jpg" alt="User profile picture">
					<h3 class="profile-username text-center">{{ $admin->firstname }} {{ $admin->lastname }}</h3>
					<a href="#" data-toggle="modal" data-target="#admin-{{ $admin->id }}-delete-modal" class="btn btn-danger btn-block btn-flat"><b>DELETE ADMIN</b></a>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-md-4">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Info:</h3>
				</div>
				<div class="box-body">
					<p>Firstname: <strong>{{ $admin->firstname }}</strong></p>
					<p>Lastname: <strong>{{ $admin->lastname }}</strong></p>
					<p>Email: <strong>{{ $admin->email }}</strong></p>
					<p>Phone: <strong>{{ $admin->phone }}</strong></p>
				</div>
				<div class="box-footer">
					<a href="{{ route('dashboard.admins.edit', $admin->id) }}" class="btn btn-info btn-block btn-flat"><b>EDIT ADMIN INFO</b></a>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-md-4">
			<div class="box-success box">
				<div class="box-header with-border">
					<h3 class="box-title">Roles:</h3>
				</div>
				<div class="box-body">
					@each('dashboard.admins.partials._single-role', $roles, 'role')
				</div>
			</div>
		</div>
	</div>

@endsection