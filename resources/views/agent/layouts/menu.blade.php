<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
	  <li class="nav-item nav-profile">
		<a href="#" class="nav-link">
		  <div class="nav-profile-image">
			<img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
			<span class="login-status online"></span>
			<!--change to offline or busy as needed-->
		  </div>
		  <div class="nav-profile-text d-flex flex-column">
			<span class="font-weight-bold mb-2">테스터</span>
			<span class="text-secondary text-small">@관리자</span>
		  </div>
		  <i class="mdi mdi-logout text-success nav-profile-badge me-2"></i>
		  
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{route('agent.home')}}">
		  <span class="menu-title">대시보드</span>
		  <i class="mdi mdi-home menu-icon"></i>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{route('agent.mypage')}}">
		  <span class="menu-title">마이페이지</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-crosshairs-gps menu-icon"></i>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{route('agent.game.betLimit')}}">
		  <span class="menu-title">최대 베팅 금액 제한</span>
		  <i class="mdi mdi-contacts menu-icon"></i>
		</a>
	  </li>
	  
	  <li class="nav-item">
		<a  class="nav-link" data-bs-toggle="collapse" href="#agent-pages" aria-expanded="false" aria-controls="agent-pages">
		  <span class="menu-title">에이전트</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-table-large menu-icon"></i>
		</a>
		<div class="collapse" id="agent-pages">
			<ul class="nav flex-column sub-menu">
				<li class="nav-item"> <a class="nav-link" href="{{ route('agent.agent.agentTree') }}"> 에이전트 트리뷰 </a></li>
				<li class="nav-item"> <a class="nav-link" href="{{ route('agent.agent.agentList') }}"> 에이전트 목록 </a></li>
				<li class="nav-item"> <a class="nav-link" href="{{ route('agent.agent.cashHistory') }}"> 트랜잭션 내역 </a></li>
				<li class="nav-item"> <a class="nav-link" href="{{ route('agent.agent.pointHistory') }}"> 포인트 내역 </a></li>
			</ul>
		</div>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" href="#user-pages" aria-expanded="false" aria-controls="user-pages">
		  <span class="menu-title">유저</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-chart-bar menu-icon"></i>
		</a>
		<div class="collapse" id="user-pages">
			<ul class="nav flex-column sub-menu">
				<li class="nav-item"> <a class="nav-link" href="{{ route('agent.ruser.users') }}"> 유저 목록 </a></li>
				<li class="nav-item"> <a class="nav-link" href="{{ route('agent.ruser.transactions') }}"> 트랜잭션내역 </a></li>
			</ul>
		</div>
	  </li>
	  {{-- <li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" href="#pot-pages" aria-expanded="false" aria-controls="pot-pages">
		  <span class="menu-title">포트(알) 충전/지급</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-medical-bag menu-icon"></i>
		</a>
		<div class="collapse" id="pot-pages">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.agent.exchange') }}"> 충전 내역 </a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.agent.payments') }}"> 지급 내역 </a></li>
		  </ul>
		</div>
	  </li> --}}
	  {{-- <li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" href="#stats-pages" aria-expanded="false" aria-controls="stats-pages">
		  <span class="menu-title">통계</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-medical-bag menu-icon"></i>
		</a>
		<div class="collapse" id="stats-pages">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.stats.agentDailyStats') }}"> 에이전트 수익통계 </a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.stats.childAgentStats') }}"> 하부 에이전트 수익통계 </a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.stats.agetnDistributionStats') }}"> 팟 유통통계 </a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.stats.casino') }}"> 카지노별 수익통계 </a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.stats.user') }}"> 유저 수익통계 </a></li>
		  </ul>
		</div>
	  </li> --}}
	  
	  <li class="nav-item">
		<a class="nav-link" href="{{ route('agent.game.gameHistory') }}">
		  <span class="menu-title">게임내역</span>
		  <i class="mdi mdi-gamepad-variant menu-icon"></i>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" href="#vendor-pages" aria-expanded="true" aria-controls="vendor-pages">
		  <span class="menu-title">벤더</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-medical-bag menu-icon"></i>
		</a>
		<div class="collapse" id="vendor-pages">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.vendor.vendors') }}"> 벤더목록 </a></li>
		  </ul>
		</div>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" data-bs-toggle="collapse" href="#developer-pages" aria-expanded="false" aria-controls="developer-pages">
		  <span class="menu-title">개발자</span>
		  <i class="menu-arrow"></i>
		  <i class="mdi mdi-medical-bag menu-icon"></i>
		</a>
		<div class="collapse" id="developer-pages">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.developer.openApi') }}"> 기본 API (분리형 지갑) </a></li>
			{{-- <li class="nav-item"> <a class="nav-link" href="{{ route('agent.developer.openApi') }}"> 기본 API (분리형 지갑) </a></li> --}}
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.developer.callbackOpenApi') }}"> 확장 API (통합형 지갑) </a></li>
			<li class="nav-item"> <a class="nav-link" href="{{ route('agent.developer.apiErrorLog') }}"> API 에러 로그 </a></li>
		  </ul>
		</div>
	  </li>
	  {{-- <li class="nav-item sidebar-actions">
		<span class="nav-link">
		  <div class="border-bottom">
			<h6 class="font-weight-normal mb-3"></h6>
		  </div>
		  <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
		  <div class="mt-4">
			<div class="border-bottom">
			  <p class="text-secondary">Categories</p>
			</div>
			<ul class="gradient-bullet-list mt-4">
			  <li>Free</li>
			  <li>Pro</li>
			</ul>
		  </div>
		</span>
	  </li> --}}
	</ul>
  </nav>
  <!-- partial -->
