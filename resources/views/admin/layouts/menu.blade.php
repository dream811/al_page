<!-- Sidebar -->
<div class="sidebar">
	<!-- SidebarSearch Form -->
	<div class="form-inline" style="margin-top: 5px;">
		<div class="input-group">
			<input class="form-control form-control-sidebar" style="text-align: center;" ng-model="strServerTime" readonly disabled>
		</div>
	</div>
	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			
			<li class="nav-item {{ (request()->routeIs('admin.user*')) ? 'menu-open' : '' }}">
				<a href="#" class="nav-link {{ (request()->routeIs('admin.user*')) ? 'active' : '' }}"> <i class="fas fa-address-card"></i>
					<p> Users <i class="right fas fa-angle-left"></i> </p>
				</a>
				{{-- <ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.user.new_list') }}" class="nav-link {{ (request()->routeIs('admin.user.new_list')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>New User List</p>
						</a>
					</li>
				</ul>
				--}}
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.user.list') }}" class="nav-link {{ (request()->routeIs('admin.user.list')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>User list</p>
						</a>
					</li>
				</ul>
			</li>
			
		</ul>
	</nav>
	<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->