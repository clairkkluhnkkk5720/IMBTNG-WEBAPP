@extends ('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('contents')

	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-eye"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Now watching</span>
					<span class="info-box-number">19</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-clone"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Total Events</span>
					<span class="info-box-number">{{ $events }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-usd"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Total Bets</span>
					<span class="info-box-number">{{ $bets->count() }} <small>{{ $bets->sum('amount') }} USD</small></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Total Members</span>
					<span class="info-box-number">{{ $users }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	{{-- <div class="row">
		
		<div class="col-md-6">
			<!-- USERS LIST -->
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Members</h3>

					<div class="box-tools pull-right">
						<span class="label label-danger">8 New Members</span>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user1-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Alexander Pierce</a>
							<span class="users-list-date">Today</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user8-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Norman</a>
							<span class="users-list-date">Yesterday</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user7-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Jane</a>
							<span class="users-list-date">12 Jan</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user6-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">John</a>
							<span class="users-list-date">12 Jan</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user2-160x160.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Alexander</a>
							<span class="users-list-date">13 Jan</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user5-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Sarah</a>
							<span class="users-list-date">14 Jan</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user4-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Nora</a>
							<span class="users-list-date">15 Jan</span>
						</li>
						<li>
							<img src="{{ asset('/dashboard-assets/dist/img/user3-128x128.jpg') }}" alt="User Image">
							<a class="users-list-name" href="#">Nadia</a>
							<span class="users-list-date">15 Jan</span>
						</li>
					</ul>
					<!-- /.users-list -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<a href="javascript:void(0)" class="uppercase">View All Users</a>
				</div>
				<!-- /.box-footer -->
			</div>
			<!--/.box -->
		</div>
		<!-- /.col -->

		<div class="col-md-6">
			
			 <!-- TABLE: LATEST ORDERS -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Bets</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Bet ID</th>
									<th>Member name</th>
									<th>Event</th>
									<th>Amount</th>
									<th>On</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="pages/examples/invoice.html">BT9842</a></td>
									<td>John Doe</td>
									<td>Call of Duty IV</td>
									<td><span class="label label-success">120 USD</span></td>
									<td>
										Team A
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT1848</a></td>
									<td>Jane Doe</td>
									<td>Project IGI VII</td>
									<td><span class="label label-warning">20 USD</span></td>
									<td>
										Team B
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT9842</a></td>
									<td>John Doe</td>
									<td>Call of Duty IV</td>
									<td><span class="label label-success">120 USD</span></td>
									<td>
										Team A
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT1848</a></td>
									<td>Jane Doe</td>
									<td>Project IGI VII</td>
									<td><span class="label label-warning">20 USD</span></td>
									<td>
										Team B
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT9842</a></td>
									<td>John Doe</td>
									<td>Call of Duty IV</td>
									<td><span class="label label-success">120 USD</span></td>
									<td>
										Team A
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT1848</a></td>
									<td>Jane Doe</td>
									<td>Project IGI VII</td>
									<td><span class="label label-warning">20 USD</span></td>
									<td>
										Team B
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT9842</a></td>
									<td>John Doe</td>
									<td>Call of Duty IV</td>
									<td><span class="label label-success">120 USD</span></td>
									<td>
										Team A
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT1848</a></td>
									<td>Jane Doe</td>
									<td>Project IGI VII</td>
									<td><span class="label label-warning">20 USD</span></td>
									<td>
										Team B
									</td>
								</tr>
								<tr>
									<td><a href="pages/examples/invoice.html">BT9842</a></td>
									<td>John Doe</td>
									<td>Call of Duty IV</td>
									<td><span class="label label-success">120 USD</span></td>
									<td>
										Team A
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer clearfix">
					<!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> -->
					<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Bets</a>
				</div>
				<!-- /.box-footer -->
			</div>
		</div>

	</div> --}}

@endsection