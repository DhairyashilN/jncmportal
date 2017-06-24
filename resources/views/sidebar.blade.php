<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset('assets/images/avatar5.png') }}" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p>{{ Auth::user()->name }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="active">
				<a href="{{ url('dashboard') }}">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ url('customers') }}">
					<i class="fa fa-users"></i> <span>Customers</span>
				</a>
			</li>
			<li>
				<a href="{{ url('enquiries') }}">
					<i class="fa fa-bullhorn" aria-hidden="true"></i> <span>Enquiries</span>
				</a>
			</li>
			<li>
				<a href="{{ url('machinery') }}">
					<i class="fa fa-cogs"></i> <span>Machinery</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-table"></i> <span>Address</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ url('country') }}"><i class="fa fa-angle-double-right"></i> Country</a>
					</li>
					<li>
						<a href="{{url ('state') }}"><i class="fa fa-angle-double-right"></i> State</a>
					</li>
					<li>
						<a href="{{url ('city') }}"><i class="fa fa-angle-double-right"></i> City</a>
					</li>
				</ul>
			</li>
			@if(Auth::user()->isSuperAdmin == 1)
			<li class="treeview">
				<a href="#">
					<i class="fa fa-wrench"></i> <span>Settings</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ url('users') }}"><i class="fa fa-angle-double-right"></i> Users</a>
					</li>
				</ul>
			</li>
			@endif
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>