@extends('agent.layouts.app')
@section('third_party_stylesheets')
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
{{-- <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet"> --}}
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.css')}}">
@endsection
@section('third_party_scripts')
<script src="{{asset('plugins/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.js')}}"></script>

@endsection
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
        </ol>
      </nav>
    </div>
    <style>

    </style>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="board-wrapper row">
              <div class=" col-6">
                <div class="card card-inverse-success">
                  <h4 class="card-title p-3" style="font-weight:bold; font-size:16px;">기본정보</h4>
                  <div class="p-2 card-body" style="">
                    <div class="row">
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:40px !important;" class="filter-input input-group-text bg-gradient-primary text-white">아 이 디</span>
                          </div>
                          <input type="text" value="{{Auth::user()->account}}" class="filter-input form-control" readonly aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <button class="btn btn-primary rounded-0">ddd</button>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:30px !important;" class="filter-input input-group-text bg-gradient-primary text-white">닉 네 임</span>
                          </div>
                          <input type="text" value="{{Auth::user()->nickname}}" class="filter-input form-control" readonly aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">에이전트등급</span>
                          </div>
                          <input type="text" value="{{Auth::user()->level->name}}" readonly class="filter-input form-control" aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">포인트요율</span>
                          </div>
                          <input type="text" value="{{Auth::user()->commission_rate}}" readonly class="filter-input form-control" aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:22px !important;" class="filter-input input-group-text bg-gradient-primary text-white">보유포인트</span>
                          </div>
                          <input type="text" value="{{Auth::user()->balance}}" class="filter-input form-control" readonly aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:15px !important;" class="filter-input input-group-text bg-gradient-primary text-white">보 유 캐 쉬</span>
                          </div>
                          <input type="text" name="" value="{{Auth::user()->cash}}" class="filter-input form-control" readonly aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:25px !important;" class="filter-input input-group-text bg-gradient-primary text-white">지 갑 타 입</span>
                          </div>
                          <input type="text" value="@if(Auth::user()->transfer_wallet == 0) 심리스 @else 트랜스퍼 @endif " readonly class="filter-input form-control" aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:40px !important;" class="filter-input input-group-text bg-gradient-primary text-white">상 태</span>
                          </div>
                          <input type="text" value="@if(Auth::user()->transfer_wallet == 0) 승인 @else 미승인 @endif" readonly class="filter-input form-control" aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <span class="filter-input input-group-text">.00</span>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span style="padding-left:25px !important;" class="filter-input input-group-text bg-gradient-primary text-white">잔 액 알 림</span>
                          </div>
                          <input type="text" id="alertOnBalance" value="{{Auth::user()->alert_on_balance}}" class="text-right filter-input form-control" aria-label="Amount">
                          <div class="input-group-append">
                            <button id="btnChangeAlertOnBalance" class="filter-input btn btn-info rounded-0" style="width:70px;padding-left:10px; padding-right:10px;">변경</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="p-2 card-body" style="">
                    <div class="row">
                      <div class="col-6 form-group">
                        <button id="btnChangePwd" class="btn btn-success rounded-0">비밀번호 변경</button>
                      </div>
                    </div>
                  </div>

                  {{-- <div id="dialog" title="비밀번호 변경" style="display:none">
                    <br>
                    <label for="name">비밀번호</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="새 비밀번호를 입력해주세요" >
                    <br>
                    <label for="name">비밀번호 재입력</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="새 비밀번호를 재입력해주세요" >
                  </div> --}}

                </div>
                <div class="card card-inverse-success mt-3">
                  <h4 class="card-title p-3" style="font-weight:bold; font-size:16px;">계좌정보</h4>
                  <div class="p-2 card-body" style="">
                    <div class="row">
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white " style="padding-left:20px;">연 락 처</span>
                          </div>
                          <input type="text" id="phone" value="{{Auth::user()->phone}}" class="filter-input form-control" aria-label="Amount">
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">은 행 명</span>
                          </div>
                          <input type="text" id="bankName" value="{{Auth::user()->bank_name}}" class="filter-input form-control" aria-label="Amount">
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">계좌정보</span>
                          </div>
                          <input type="text" id="accountNumber" value="{{Auth::user()->account_number}}" class="filter-input form-control" aria-label="Amount">
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class=" input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">예 금 주</span>
                          </div>
                          <input type="text" id="accountHolder" value="{{Auth::user()->account_holder}}" class="filter-input form-control" aria-label="Amount">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="p-2 card-body">
                    <div class="row">
                      <div class="col-6 form-group">
                        <button id="btnChangeBankInfo" class="btn btn-success rounded-0">계좌정보 변경</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card card-inverse-success">
                  <h4 class="card-title p-3" style="font-weight:bold; font-size:16px;">API 정보</h4>
                  <div class="p-2 card-body">
                    {{-- <p class="card-text"> Hover this colored area for context menu</p> --}}
                    <div class="row">
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">토큰</span>
                          </div>
                          <input type="text" id="token" value="{{Auth::user()->token}}" readonly class="filter-input form-control" aria-label="Amount">
                          <div class="input-group-append">
                            <button  id="btnChangeToken" class="filter-input btn btn-info rounded-0" style="width:70px;padding-left:10px; padding-right:10px;">재발급</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">URL</span>
                          </div>
                          <input type="text" value="http://devall77.com/api/v1" readonly  class="filter-input form-control" aria-label="Amount">
                          {{-- <div class="input-group-append">
                            <button class="btn btn-success rounded-0">재발급</button>
                          </div> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>

                <div class="card card-inverse-success mt-3">
                  <h4 class="card-title p-3" style="font-weight:bold; font-size:16px;">트랜스퍼 머니 Callback 정보</h4>
                  <div class="p-2 card-body">
                    {{-- <p class="card-text"> Hover this colored area for context menu</p> --}}
                    <div class="row">
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">토큰</span>
                          </div>
                          <input type="text" id="callbackToken" value="{{Auth::user()->callback_token}}" readonly class="filter-input form-control" aria-label="Amount">
                          <div class="input-group-append">
                            <button id="btnChangeCallbackToken" class="filter-input btn btn-info rounded-0" style="width:70px;padding-left:10px; padding-right:10px;">재발급</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">URL</span>
                          </div>
                          <input type="text" id="callbackUrl" value="{{Auth::user()->callback_url}}" class="filter-input form-control" aria-label="Amount">
                          <div class="input-group-append">
                            <button id="btnChangeCallbackUrl" class="filter-input btn btn-info rounded-0" style="width:70px;padding-left:10px; padding-right:10px;">변경</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <p class="card-description">사용설명 <code>구현시 아래의 내용을 참고하세요. </code></p>
                      <div class="col-6">
                        
                        <ul class="list-ticked">
                          <li>Callback TOKEN은(는) 콜백 API 개발 시 아래와 같이 전송 받으신 헤더를 체크 하셔야 합니다.</li>
                          <li>Callback-Token: 콜백 토큰값</li>
                          <li>하부 콜백 요청 시 헤더의 Callback-Token 값을 콜백 토큰 값으로 보내오니 꼭 체크 바랍니다.</li>
                          <li>헤더 Callback-Token 해당값이 현재 페이지의 Callback TOKEN값과 다른 경우 ERROR 리턴 조치 바랍니다.</li>
                        </ul>
                      </div>
                      
                      <div class="col-6">
                        
                        <ul class="list-ticked">
                          <li>Callback URL은(는) http://, https:// 중 하나로 시작해야 합니다.</li>
                          <li>ex) https://test.com/callback</li>
                          <li>콜백 URL 설정 후 실서버 적용까지 최대 10분 정도 소요 될 수 있습니다.</li>
                          <li>실시간으로 유저의 잔액 정보 변경 내역을 사이트로 전송합니다.</li>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                      <p class="card-description">트랜스퍼 머니 Callback 데이터 예시 <code>구현시 아래의 데이터를 참고하세요. </code></p>
                      <div class="col-12">
                        <ul class="list-arrow">
                          <li>베팅</li>
                          <p class="text-light bg-dark ps-1" style="display:block;word-wrap:normal;font-size:12px; overflow-y: hidden; ">
                            {"account":"test","transaction_id":"DK123456789","type":"bet","amount":1000,"before_balance":11000,"after_balance":10000}
                          </p>
                          <li>당첨</li>
                          <p class="text-light bg-dark ps-1" style="display:block;word-wrap:normal;font-size:12px; overflow-y: hidden; ">
                            {"account":"test","transaction_id":"CK123456789","type":"win","amount":1000,"before_balance":10000,"after_balance":11000}
                          </p>
                          <li>유저머니 지급</li>
                          <p class="text-light bg-dark ps-1" style="display:block;word-wrap:normal;font-size:12px; overflow-y: hidden; ">
                            {"account":"test","transaction_id":null,"type":"deposit","amount":1000,"before_balance":9000,"after_balance":10000}
                          </p>
                          
                          <li>유저머니 회수</li>
                          <p class="text-light bg-dark ps-1" style="display:block;word-wrap:normal;font-size:12px; overflow-y: hidden; ">
                            {"account":"test","transaction_id":null,"type":"withdraw","amount":1000,"before_balance":11000,"after_balance":10000}
                          </p>
                          <li>유저머니 일괄회수</li>
                          <p class="text-light bg-dark ps-1" style="display:block;word-wrap:normal;font-size:12px; overflow-y: hidden; ">
                            {"account":"test","transaction_id":null,"type":"withdraw_all","amount":10000,"before_balance":10000,"after_balance":0}
                          </p>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-inverse-success mt-3">
                  <h4 class="card-title p-3" style="font-weight:bold; font-size:16px;">게임 상세정보 Callback 정보</h4>
                  <div class="p-2 card-body">
                    {{-- <p class="card-text"> Hover this colored area for context menu</p> --}}
                    <div class="row">
                      <div class="col-6 form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="filter-input input-group-text bg-gradient-primary text-white">URL</span>
                          </div>
                          <input type="text" id="detailCallbackUrl" value="{{Auth::user()->detail_callback_url}}" class="filter-input form-control" aria-label="Amount">
                          <div class="input-group-append">
                            <button id="btnChangeDetailCallbackUrl" class="filter-input btn btn-success rounded-0">변경</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <ul class="list-ticked">
                          <li>게임 상세정보 생성 시 해당 URL로 전송합니다.</li>
                          <li>Callback URL은(는) http://, https:// 중 하나로 시작해야 합니다.</li>
                          <li>ex) https://test.com/callback</li>
                          <li>콜백 URL 설정 후 실서버 적용까지 최대 10분 정도 소요 될 수 있습니다.</li>
                          <li>사용하지 않는 경우 Callback URL을 비워주세요.</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
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
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	});	
	$( "#btnChangeAlertOnBalance" ).on( "click", function() {
		Swal.fire({
			title: 'Warning',
			text: "잔액(POINT) 이하 알림을 변경 하시겠습니까?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '예',
			cancelButtonText: '아니요'
			}).then((result) => {
			if (result.isConfirmed) {
				
				var action = '/changeMyInfo/0';
            
				$.ajax({
					url: action,
					data: {alert_on_balance: $('#alertOnBalance').val()},
					type: "POST",
					dataType: 'json',
					success: function ({status, data}) {
						if(status == "success"){
							Swal.fire(
								'성공!',
								'잔액(POINT) 이하 알림 설정을 변경하였습니다.',
								'success'
							)
						}else{
							Swal.fire(
								'실패!',
								'잔액(POINT) 이하 알림 설정변경에 실패하였습니다.',
								'error'
							)
						}
					},
					error: function (data) {
						// card.parent().css("color", "red")
						// card.parent().html('error, try again later')
					}
				});
			}
		})
	});

	
	$( "#btnChangeBankInfo" ).on( "click", function() {
		Swal.fire({
			title: '은행정보를 변경하시겠습니까?',
			text: "변경된 은행정보를 보관합니다!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '예',
			cancelButtonText: '아니요'
			}).then((result) => {
			if (result.isConfirmed) {
				var action = '/changeMyInfo/2';
            
				$.ajax({
					url: action,
					data: {phone: $('#phone').val(), bank_name: $('#bankName').val(), account_number: $('#accountNumber').val(), account_holder: $('#accountHolder').val()},
					type: "POST",
					dataType: 'json',
					success: function ({status, data}) {
						if(status == "success"){
							Swal.fire(
								'성공!',
								'은행정보를 변경하였습니다.',
								'success'
							)
						}else{
							Swal.fire(
								'실패!',
								'은행정보 변경에 실패하였습니다.',
								'error'
							)
						}
					},
					error: function (data) {
						// card.parent().css("color", "red")
						// card.parent().html('error, try again later')
					}
				});
				
			}
		})
	});

	
	$( "#btnChangeToken" ).on( "click", function() {
		Swal.fire({
			title: '토큰 변경',
			text: "API토큰을 재발급합니다!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '예',
			cancelButtonText: '아니요'
			}).then((result) => {
			if (result.isConfirmed) {
				var action = '/changeMyInfo/3';
            
				$.ajax({
					url: action,
					data: {token: $('#token').val()},
					type: "POST",
					dataType: 'json',
					success: function ({status, data}) {
						if(status == "success"){
							$('#token').val(data);
							Swal.fire(
								'성공!',
								'API 토큰을 재발급하였습니다.',
								'success'
							)
						}else{
							Swal.fire(
								'실패!',
								'API 토큰 재발급에 실패하였습니다.',
								'error'
							)
						}
					},
					error: function (data) {
						// card.parent().css("color", "red")
						// card.parent().html('error, try again later')
					}
				});

				
			}
		})
	});

	$( "#btnChangeCallbackToken" ).on( "click", function() {
		Swal.fire({
			title: '콜백토큰 변경',
			text: "콜백토큰을 재발급하시겠습니까?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '예',
			cancelButtonText: '아니요'
			}).then((result) => {
			if (result.isConfirmed) {
				var action = '/changeMyInfo/4';
            
				$.ajax({
					url: action,
					data: {callback_token: $('#callbackToken').val()},
					type: "POST",
					dataType: 'json',
					success: function ({status, data}) {
						if(status == "success"){
							$('#callbackToken').val(data);
							Swal.fire(
								'성공!',
								'콜백 토큰을 재발급하였습니다.',
								'success'
							)
						}else{
							Swal.fire(
								'실패!',
								'콜백 토큰 재발급에 실패하였습니다.',
								'error'
							)
						}
					},
					error: function (data) {
						// card.parent().css("color", "red")
						// card.parent().html('error, try again later')
					}
				});
				
			}
		})
	});

	$( "#btnChangeCallbackUrl" ).on( "click", function() {
		Swal.fire({
			title: '콜백URL 변경',
			text: "트랜스퍼 머니 Callback URL을 변경 하시겠습니까?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '예',
			cancelButtonText: '아니요'
			}).then((result) => {
			if (result.isConfirmed) {
				
				var action = '/changeMyInfo/5';
            
				$.ajax({
					url: action,
					data: {callback_url: $('#callbackUrl').val()},
					type: "POST",
					dataType: 'json',
					success: function ({status, data}) {
						if(status == "success"){
							Swal.fire(
								'성공!',
								'콜백 URL을 재발급하였습니다.',
								'success'
							)
						}else{
							Swal.fire(
								'실패!',
								'콜백 URL 재발급에 실패하였습니다.',
								'error'
							)
						}
					},
					error: function (data) {
						// card.parent().css("color", "red")
						// card.parent().html('error, try again later')
					}
				});

				
			}
		})
	});

	
	$( "#btnChangeDetailCallbackUrl" ).on( "click", function() {
		Swal.fire({
			title: '상세콜백URL 변경',
			text: "상세 Callback URL을 변경 하시겠습니까?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '예',
			cancelButtonText: '아니요'
			}).then((result) => {
			if (result.isConfirmed) {
				var action = '/changeMyInfo/6';
            
				$.ajax({
					url: action,
					data: {detail_callback_url: $('#detailCallbackUrl').val()},
					type: "POST",
					dataType: 'json',
					success: function ({status, data}) {
						if(status == "success"){
							Swal.fire(
								'성공!',
								'상세 콜백 URL을 재발급하였습니다.',
								'success'
							)
						}else{
							Swal.fire(
								'실패!',
								'상세 콜백 URL 재발급에 실패하였습니다.',
								'error'
							)
						}
					},
					error: function (data) {
						// card.parent().css("color", "red")
						// card.parent().html('error, try again later')
					}
				});
				
			}
		})
	});
  $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Save": { 
          	click: function () {
                $(this).dialog("close");
			},
			text: '변경',
			class: 'ui-button ui-corner-all ui-widget'
		},
        
		"Cancel": { 
          	click: function () {
                $(this).dialog("close");
			},
			text: '취소',
			class: 'ui-button ui-corner-all ui-widget'
		},
      },
      close: function() {
        // form[ 0 ].reset();
        // allFields.removeClass( "ui-state-error" );
      }
    });
  });
  $( "#btnChangePwd" ).on( "click", function() {
    //$( "#dialog" ).dialog("open");
	Swal.fire({
		title: '비밀번호 변경',
		html: `<input type="password" id="password" class="swal2-input" placeholder="Password">
		<input type="password" id="password_confirm" class="swal2-input" placeholder="Password Confirm">`,
		confirmButtonText: 'Save',
		focusConfirm: false,
		preConfirm: () => {
			const password = Swal.getPopup().querySelector('#password').value
			const password_confirm = Swal.getPopup().querySelector('#password_confirm').value
			if (!password || !password_confirm) {
				Swal.showValidationMessage(`새로 설정하려는 비번을 입력하세요.`)
			}
			if (password != password_confirm) {
				Swal.showValidationMessage(`비번이 일치하지 않습니다.`)
			}
			return { password: password, password_confirm }
		}
	}).then((result) => {
		var action = '/changeMyInfo/1';
            
		$.ajax({
			url: action,
			data: result.value,
			type: "POST",
			dataType: 'json',
			success: function ({status, data}) {
				if(status == "success"){
					Swal.fire(
						'성공!',
						'비밀번호를 변경하였습니다.',
						'success'
					)
				}else{
					Swal.fire(
						'실패!',
						'비밀번호 변경에 실패하였습니다.',
						'error'
					)
				}
			},
			error: function (data) {
				// card.parent().css("color", "red")
				// card.parent().html('error, try again later')
			}
		});
		
		
	})
  });
</script>
@endpush