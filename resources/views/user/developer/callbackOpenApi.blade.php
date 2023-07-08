@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title" style="font-weight:bold">
      <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
        <i class="mdi mdi-home"></i>
      </span> API 가이드
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">API 가이드</li><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        {{-- <li class="breadcrumb-item active" aria-current="page">베팅내역</li> --}}
      </ol>
    </nav>
  </div>
  
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title" style="font-weight:bold">에볼루션 확장(Seamless) API</h4>
          <p class="card-description"><code>/developer/openapi.yaml</code>
          </p>
          <table class="table">
            <tbody>
              <tr>
                <td >
                  <small style="color: gray">	
                    확장(Seamless) API를 테스트 할 수 있는 페이지입니다.<br>
                  </small>
                </td>
              </tr>
              <tr>
                <td>
                  <h5 style="font-weight:bold">연동 및 테스트 완료 후 반드시 "API 호출 허용 IP 설정"</h5>
                  <small style="color: gray">
                    연동 완료 후 반드시 "마이페이지" > "API 호출 허용 IP 설정" 에서 API를 호출할 IP를 화이트리스트로 등록해주시기 바랍니다.
                  </small>
                  <h6 class="mt-2" style="font-weight:bold">필수 HTTP 헤더</h6>
                  <small style="color: gray">API의 이용과 관련한 모든 HTTP 요청은 아래의 HTTP 헤더를 포함해야 합니다.</small>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>이름</th>
                        <th>값</th>
                        <th>예시</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Authorization</td>
                        <td>Bearer {전달받은 API KEY}</td>
                        <td>Authorization: Bearer xl2oH8NypvMziSCPS9hOeyW1KbTd9Ht1RgnV7CAu</td>
                      </tr>
                      <tr>
                        <td>Accept</td>
                        <td>application/json</td>
                        <td>Accept: application/json</td>
                      </tr>
                      <tr>
                        <td>Authorization</td>
                        <td>application/json</td>
                        <td>Content-Type: application/json</td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <small style="color: gray;">우측에  아이콘이 <i class="mdi mdi-lock-open"></i> 있는 경우 Authorization 헤더가 필요합니다.</small>
                  <h5 style="font-weight:bold" class="mt-3">테스트시 인증 정보 전달 방법</h5>
                  <small style="color: gray;">이 페이지에서 테스트 하실 때는 우측 하단에  아이콘을 클릭해 사용할 제공받은 토큰을 입력하여 테스트 하실 수 있습니다.</small>
                  <h5 style="font-weight:bold" class="mt-3">에러 응답</h5>
                  <small style="color: gray;">정상적인 결과는 HTTP Status Code 200을 비정상적인 상황은 HTTP Status Code 4xx 코드를 리턴하며,</small>
                  <small style="color: gray;">아래 예시처럼 에러가 발생한 파라미터와 해당 에러를 표시합니다.</small>
                  <br>
                  <pre style="background-color: lightgray;">
                    <code>
                    {
                      "errors": {
                        "파라미터1" : ["에러메시지"], 
                        "파라미터2": ["에러메시지"]
                      }
                    }
                    </code>
                  </pre>
                  <h5 style="font-weight:bold" class="mt-3">한글 인코딩</h5>
                  <small style="color:gray;">
                    정상적인 결과는 HTTP Status Code 200을 비정상적인 상황은 HTTP Status Code 4xx 코드를 리턴하며,<br>
                    모든 한글 및 특수 문자를 포함한 모든 데이터는 UTF-8 without BOM를 사용해주셔야하며,<br>
                    특히 윈도우 서버에서 개발하시는 분들은 이점을 확인해주시기 바랍니다. <br>
                    만일 EUR-KR 인코딩을 사용하여 요청하는 경우 정상적인 서비스 이용이 불가 및 주기적인 에러 발생으로 차단되어지실 수 있습니다.<br>
                  </small>
                  <h5 style="font-weight:bold" class="mt-3">타임존</h5>
                  <small style="color:gray;">
                    본 API 서비스의 타임존은 협정 세계시(UTC)를 사용하며, 한국 시각(Asia/Seoul)으로 보기 위해선 +9시간을 더 하셔야 합니다.<br>
                    반대로 검색하시기 위해선 한국시간 -9 시간을 해주셔야합니다.<br>
                  </small>
                  <h5 style="font-weight:bold" class="mt-3">보타 개발시 개발자 확인사항</h5>
                  <small style="color:gray;">
                    보타는 칩을 올린 뒤 베팅 타임이 끝나기전 "취소"를 할 수 있습니다.<br>
                    따라서 아래의 내용을 테스트하신 후 오픈을 진행하시는 것을 권장 드립니다.<br>
                  </small>
                  
                  <h5 style="font-weight:bold" class="mt-3">구현시 주의사항</h5>
                  <small style="color:gray;">
                    보타의 경우 유저가 한 라운드가 끝나기 전 취소 를 할 수 있으며,<br>
                    취소 후 10초가 지난 뒤에 베팅이 가능합니다.<br>
                  </small>
                  <br>
                  <small style="color:gray;">
                    트랜잭션이 아래와 같은 방식으로 처리되며, 이에 정상적으로 처리되는지 확인해주셔야합니다.
                  </small>
                  <ol style="color:gray; font-size:12px !important;">
                    <li><p>일반 적인 베팅 후 결과가 처리되는 경우<br>
                    1-1.Bet - Win<br>
                    1-2.Bet - Cancel<br>
                    : 위 경우는 아무런 문제가 없어야 합니다.</p></li>
                    <li><p>"같은 라운드"에서 여러번 베팅 후 결과 처리되는 경우<br>
                    ({} 는 하나의 처리 묶음입니다.)<br>
                    2-1. {Bet - Bet - Win}<br>
                    2-2. {Bet - Bet - Cancel}<br>
                    : 한 라운드에 2번 이상 베팅이 가능하며, 이후 한번의 결과가 전달되게 됩니다. 이 경우 Win과 Cancel은 앞에 2번 베팅한 결과 값이 마지막 처리에 한번에 전달됩니다.<br>
                    예시)<br>
                    2-1: 1,000 (player) + 1,000 (player pair): 당첨금 "14,000" WIN 트랜잭션 한번만 전달됩니다.<br>
                    2-2: 1,000 (player) + 1,000 (player pair): 취소된 금액 "2,000"이 cancel 트랜잭션 한번만 전달됩니다.<br>
                    + 여기서 cancel/win 트랜잭션의 referer_id 는 가장 처음의 Bet 을 가리킵니다.</p></li>
                    <li><p>"같은 라운드"에서 베팅과 취소를 반복한 후 결과 처리되는 경우<br>
                    ({} 는 하나의 처리 묶음입니다.)<br>
                    3-1. {Bet - Cancel} - {Bet - Win}<br>
                    3-2. {Bet - Cancel} - {Bet - Cancel} ...<br>
                    : 한 회차에 베팅-취소-베팅-취소 가 반복 될 수 있으며, 취소된 베팅들은 이후 베팅과 결과에 영향을 끼치지 않습니다.<br>
                    (취소 후 다음 베팅까지 10초의 대기시간이 있으며, 한 라운드에 베팅시간은 50초 씩이므로 이론상 5번 까지 취소가 가능합니다.)</p></li>
                    <pre style="background-color: lightgray;"><code>{
                      "errors": {
                        "파라미터1" : ["에러메시지"], 
                        "파라미터2": ["에러메시지"]
                      }
                    }
                    </code></pre></ol>

                    <h5 style="font-weight:bold" class="mt-3">업데이트 내역</h5>
                    <small style="color:gray;">
                      1.2.0<br>
                      - `/user/sub-balance` API 추가
                    </small>
                    <br>
                    <small style="color:gray;">
                      1.0.0<br>
                      - 최초 개발
                    </small>
                    <h4 style="font-weight: bold">API 개발흐름</h4>
                    <ol style="color:gray;">
                      <li>API KEY를 발급받습니다.</li>
                      <li>API KEY과 헤더정보를 추가해 <code>/my-info</code> 를 호출해 정상적으로 자신의 계정 정보가 불러와 지는지 확인합니다.</li>
                      <li><code>/user/create</code> API로 유저를 생성</li>
                      <li><code>/user/refresh-token</code> API로 3번에서 생성한 유저의 접속 token을 발급 받습니다.</li>
                      <li>게임을 바로 접속하시려면 <code>/game-list</code>, 게임이 나열되어있는 로비로 접속하고 싶으시면 <code>/lobby-list</code>를 통해 접속을 위한 <code>id</code> 값을 가져옵니다.<br>
                      5-1. "트랜스퍼" 사용시 <code>/user/add-balance</code> 를 이용해 유저의 머니를 추가해 줍니다.<br>
                      5-2. "심리스" 사용시 확장형 API를 구현해주세요.</li>
                      <li><code>/get-game-url</code> API 혹은 <code>/open</code> API에 4.번에서 받은 token과 5.번에서 저장한 <code>id</code>를 전달하면 게임이 실행되게 됩니다.</li>
                      </ol>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="row">
                    <button class="btn btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      에이전트
                      <small>에이전트 정보 조회 API</small>
                    </button>
                  </p>
                  <div class="collapse" id="collapseExample">
                    <p class="row">
                      <button  style="text-align:left" class="btn btn-success btn-xs" type="button" data-bs-toggle="collapse" data-bs-target="#api1" aria-expanded="false" aria-controls="api1">
                        POST
                        <small>
                          <code>
                            /user/create
                          </code>유저 신규 생성
                        </small>
                      </button>
                    </p>
                    <div class="collapse" id="api1">
                      <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                      </div>
                    </div>
                    <p class="row">
                      <button style="text-align: left;" class="btn btn-success btn-xs" type="button" data-bs-toggle="collapse" data-bs-target="#api2" aria-expanded="false" aria-controls="api2">
                        PATCH
                        <small><code>/user/refresh-token
                          </code>게임/로비 접속용 토큰 발급</small>
                      </button>
                    </p>
                    <div class="collapse" id="api2">
                      <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    
  </div>
  
</div>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });	
        

    </script>
@endpush