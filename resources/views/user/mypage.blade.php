@extends('user.layouts.app')
@section('script')
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
@endsection
@section('content')
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title" style="font-weight:bold">
        <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
          <i class="mdi mdi-home"></i>
        </span> 마이페이지
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">마이페이지</li><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          {{-- <li class="breadcrumb-item active" aria-current="page">베팅내역</li> --}}
        </ol>
      </nav>
    </div>
    
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">기본정보</h4>
            <p class="card-description"> </code>
            </p>
            <table class="table">
              
              <tbody>
                <tr>
                  <th style="width:20%">번호</th>
                  <td>1816</td>
                </tr>
                <tr>
                  <th style="width:20%">분류</th>
                  <td>매장<!--<label class="badge badge-danger">Pending</label>--></td>
                </tr>
                <tr>
                  <th style="width:20%">타입</th>
                  <td>운영</td>
                </tr>
                <tr>
                  <th style="width:20%">소속에이전트</th>
                  <td>	
                    <span style="width:50px !important;">동&nbsp;&nbsp;&nbsp;&nbsp;해</span>
                    <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-outline-light text-black dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                      <div class="dropdown-menu" style="">
                        <a class="dropdown-item"></a>
                      </div>
                    </div>
                    <br>
                    <span style="width:50px;">테스트</span>
                    <div class="btn-group">
                      <button type="button" class="btn btn-xs btn-secondary text-black dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                      <div class="dropdown-menu text-xs" style="font-size:12px;">
                        <a class="dropdown-item disabled">에이전트</a>
                        <a class="dropdown-item">수정</a>                        
                        <a class="dropdown-item">지급내역</a>                        
                        <a class="dropdown-item">충전내역</a>
                                 
                        <a class="dropdown-item disabled">유저</a>               
                        <a class="dropdown-item">유저목록</a>                        
                        <a class="dropdown-item">지급내역</a>                        
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">아이디</th>
                  <td>test12</td>
                </tr>
                <tr>
                  <th style="width:20%">닉네임</th>
                  <td>테스트</td>
                </tr>
                <tr>
                  <th style="width:20%">비밀번호</th>
                  <td>
                    <button type="button" class="btn btn-xs btn-secondary">비밀번호 변경</button>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">API KEY</th>
                  <td>
                    <div class="input-group" style="width:300px;">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-primary h-100" type="button">재발급</button>
                      </div>
                    </div>
                    <small>API KEY는 개발에 필요한 정보입니다. 개발자에게 전달해주세요.</small>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">API 호출 허용 IP 설정</th>
                  <td>
                    <small style="color: gray">	
                      API 호출 허용 IP를 등록하지 않으면, 여러 IP에서 호출이 가능합니다,<br>
                      한번 등록하면 수정이 불가능하며, 변경을 원하실 경우 링크 측에 변경 요청 해주셔야합니다.<br>
                      다중 ip는 콤마(,)로 구분하며 띄여쓰기는 허용되지 않습니다.<br><br>
                    </small>
                    <div class="input-group " style="width: 500px;">
                      <input type="text" class="form-control " placeholder="Recipient's username" aria-label="Recipient's username" readonly aria-describedby="basic-addon2">
                    </div>
                    <br>
                    <small>운영중엔 API 호출 허용 IP 등록을 해주시는것을 권장드립니다.</small>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">Callback URL</th>
                  <td>
                    <div class="input-group" style="width:300px;">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-primary h-100" type="button">발급</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">계좌 번호</th>
                  <td>
                    <div class="input-group" style="width:300px;">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-primary h-100" type="button">발급</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">현재 보유 금액</th>
                  <td>
                    1,209,581 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">하부 에이전트 현재 총 보유 금액</th>
                  <td>
                    0 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">하부 유저 현재 총 보유 금액</th>
                  <td>
                    690,595 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">요율</th>
                  <td>
                    8 %
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">총 지급받은 금액</th>
                  <td>
                    1,650,000 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">총 충전받은 금액</th>
                  <td>
                    0 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">총 지급해준 금액</th>
                  <td>
                    0 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">총 충전해준 금액</th>
                  <td>
                    0 Pot
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">하부 에이전트 수</th>
                  <td>	
                    전체 &emsp; &emsp; &emsp; &emsp;
                    0 명
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">하부 유저 수</th>
                  <td>
                    59 명
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">가입 시각</th>
                  <td>
                    22-01-19 19:09
                  </td>
                </tr>
              </tbody>
            </table>
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