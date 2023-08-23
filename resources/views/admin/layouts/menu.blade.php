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
			<li class="nav-item {{ (request()->routeIs('admin.users*')) ? 'menu-open' : '' }}">
				<a href="#" class="nav-link {{ (request()->routeIs('admin.users*')) ? 'active' : '' }}"> <i class="fas fa-address-card"></i>
					<p> 고객센터 <i class="right fas fa-angle-left"></i> </p>
				</a>
				
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>1:1문의</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>공지사항</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>공지사항</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>공지사항</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item {{ (request()->routeIs('admin.company*')) ? 'menu-open' : '' }}">
				<a href="#" class="nav-link {{ (request()->routeIs('admin.company*')) ? 'active' : '' }}"> <i class="fas fa-address-card"></i>
					<p> 게임사관리 <i class="right fas fa-angle-left"></i> </p>
				</a>
				
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.company.vcompanies') }}" class="nav-link {{ (request()->routeIs('admin.company.vcompanies')) ? 'active' : '' }}">
							<i class="fab fa-youtube"></i>
							<p>영상사</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.company.vendors') }}" class="nav-link {{ (request()->routeIs('admin.company.vendors')) ? 'active' : '' }}">
							<i class="fas fa-sitemap"></i>
							<p>벤더사</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.company.gcompanies') }}" class="nav-link {{ (request()->routeIs('admin.company.gcompanies')) ? 'active' : '' }}">
							<i class="fas fa-chess"></i>
							<p>게임사</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item {{ (request()->routeIs('admin.agent*')) ? 'menu-open' : '' }}">
				<a href="#" class="nav-link {{ (request()->routeIs('admin.agent*')) ? 'active' : '' }}"> <i class="fas fa-address-card"></i>
					<p> 에이전트 관리 <i class="right fas fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.agent.company') }}" class="nav-link {{ (request()->routeIs('admin.agent.company')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>게임사설정</p>
						</a>
					</li>
				</ul>

				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.agent.agents') }}" class="nav-link {{ (request()->routeIs('admin.agent.agents')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>에이전트목록</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>에이전트충전</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>에이전트환전</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>포인트전환</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>정산내역</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="/temp/{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users----')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>캐쉬내역</p>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item {{ (request()->routeIs('admin.user*')) ? 'menu-open' : '' }}">
				<a href="#" class="nav-link {{ (request()->routeIs('admin.user*')) ? 'active' : '' }}"> <i class="fas fa-address-card"></i>
					<p> 회원관리 <i class="right fas fa-angle-left"></i> </p>
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
						<a href="{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>회원목록</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users--')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>회원충환전</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users--')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>베팅내역</p>
						</a>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{ route('admin.user.users') }}" class="nav-link {{ (request()->routeIs('admin.user.users--')) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>머니내역</p>
						</a>
					</li>
				</ul>
			</li>
			
		</ul>
	</nav>
	<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->