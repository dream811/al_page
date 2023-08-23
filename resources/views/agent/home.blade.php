@extends('agent.layouts.app')
@section('script')
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
@endsection
@section('content')
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title" style="font-weight:bold">
        <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
          <i class="mdi mdi-home"></i>
        </span> 대시보드
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row" style="padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5);">
      <div class="alert alert-warning" role="alert" style="background-color: rgba(254, 215, 19, 0.2);
      border-color: #eac611;"> 
        <h6>사용중인 비밀번호가 해킹에 취약합니다. 숫자,영문,특문 을 포함한 8자리 이상의 조합해 변경 하시기 바랍니다.</h6> 
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body" style="padding: 1rem 1rem">
            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h5 class="font-weight-normal mb-3">나의 보유포인트 <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h5>
            <h4 class="mb-3">$ 15,0000</h4>
            {{-- <h6 class="card-text">Increased by 60%</h6> --}}
          </div>
        </div>
      </div>
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body"  style="padding: 1rem 1rem">
            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h5 class="font-weight-normal mb-3">나의 보유캐쉬 <br> 총 보유 금액 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h5>
            <h4 class="mb-3">45,6334</h4>
            {{-- <h6 class="card-text">Decreased by 10%</h6> --}}
          </div>
        </div>
      </div>
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body"  style="padding: 1rem 1rem">
            <h5 class="font-weight-normal mb-3">나의 유저수 <br> 총 보유 금액 <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h5>
            <h4 class="mb-3">95,5741</h4>
            {{-- <h6 class="card-text">Increased by 5%</h6> --}}
          </div>
        </div>
      </div>
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body"  style="padding: 1rem 1rem">
            <h5 class="font-weight-normal mb-3">벤더수 / 게임수 <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h5>
            <h4 class="mb-3">95,5741</h4>
            {{-- <h6 class="card-text">Increased by 5%</h6> --}}
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body" style="padding: 1rem 1rem">
            {{-- <img src="{{asset('assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> --}}
            <h5 class="font-weight-normal mb-3">하부(전체) 포인트 <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h5>
            <h4 class="mb-3">$ 15,0000</h4>
            {{-- <h6 class="card-text">Increased by 60%</h6> --}}
          </div>
        </div>
      </div>
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body"  style="padding: 1rem 1rem">
            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">하부(전체) 캐쉬 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-3">45,6334</h2>
            {{-- <h6 class="card-text">Decreased by 10%</h6> --}}
          </div>
        </div>
      </div>
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body"  style="padding: 1rem 1rem">
            <h4 class="font-weight-normal mb-3">하부(전체) 유저수 <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-3">95,5741</h2>
            {{-- <h6 class="card-text">Increased by 5%</h6> --}}
          </div>
        </div>
      </div>
      <div class="col-md-3 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body" style="padding: 1rem 1rem">
            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">하부(전체) 에이전트수 <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-3">95,5741</h2>
            {{-- <h6 class="card-text">Increased by 5%</h6> --}}
          </div>
        </div>
      </div>
    </div>
    
    
    
  </div>
  <!-- content-wrapper ends -->
  
<!-- main-panel ends -->
@endsection
@push('page_scripts')
<script>

</script>
@endpush