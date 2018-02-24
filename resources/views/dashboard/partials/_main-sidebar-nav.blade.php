<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="/dashboard-assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ admin()->firstname }} {{ admin()->lastname }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">

			<li @if (currentRouteName() === 'dashboard.index') class="active" @endif>
				<a href="{{ route('dashboard.index') }}">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i>
					<span>Admins</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> All Admins</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Create New Role</a></li>
				</ul>
			</li>

			<li class="treeview @if (strpos(currentRouteName(), 'dashboard.roles.') !== false) active menu-open @endif">
				<a href="#">
					<i class="fa fa-universal-access"></i>
					<span>Roles</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li @if (currentRouteName() === 'dashboard.roles.index') class="active" @endif>
						<a href="{{ route('dashboard.roles.index') }}"><i class="fa fa-circle-o"></i> All Roles</a>
					</li>
					<li @if (currentRouteName() === 'dashboard.roles.create') class="active" @endif>
						<a href="{{ route('dashboard.roles.create') }}"><i class="fa fa-circle-o"></i> Create New Role</a>
					</li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>