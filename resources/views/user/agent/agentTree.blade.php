@extends('user.layouts.app')
@section('third_party_stylesheets')
<link rel="stylesheet" href="{{asset('plugins/bootstrap-treeview/css/bootstrap-treeview-ext.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
@endsection
@section('third_party_scripts')
<script src="{{asset('plugins/bootstrap-treeview/js/bootstrap-treeview-ext.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.js')}}"></script>

@endsection
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 에이전트 트리뷰 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">에이전트</a></li>
            <li class="breadcrumb-item active" aria-current="page">에이전트 트리뷰</li>
          </ol>
        </nav>
      </div>      
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body row">
              {{-- <h4 class="card-title">Striped Table</h4>
              <p class="card-description"> Add class <code>.table-striped</code>
              </p> --}}
              <div class="col-4">
                <div class="card">
                  <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                  <br>
                  <div id="tree"></div>
                </div>
                
              </div>
              <div class="col-8">
                <div class="card">
                  {{-- <div class="form-group row mb-0">
                    <label for="strID" class="text-left text-sm-right col-sm-3 col-md-2 col-form-label">ID<code style="color:red !important;">[필수]</code></label>
                    <div class="col-sm-9 col-md-6">
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="Please input a unique id" >
                    </div>
                </div> --}}
                  <div class="table-responsive">
                    <table class="table table-bordered mb-0 align-middle">
                      <tbody>
                        <!----><tr>
                          <td>닉네임 (아이디)</td>
                          <td> <span id="account">agent</span>
                            <i class="mdi mdi-border-color" style="color: #b66dff; font-size: 1.125rem;" role="button" tabindex="0"></i>
                          </td>
                          <td>에이전트 등급</td>
                          <td><span style="color: #b66dff;" class="fs-6 badge rounded-0 bg-yellow"> AgentA </span></td>
                        </tr>
                        <tr>
                          <td>보유포인트</td><td id="point" class="text-end">1,521 <b>POINT</b></td>
                          <td>포인트요율</td><td id="rate" class="text-end"> 8 <b>%</b><!----></td><!---->
                        </tr>
                        <tr>
                          <td>보유캐쉬</td>
                          <td id="cash" class="text-end">0 <b>KRW</b></td>
                          <td id="alertOnBalance">잔액(POINT) 이하 알림</td><td class="text-end">0 </td>
                        </tr>
                        <tr>
                          <td>계좌정보</td>
                          <td id="bank">    </td>
                          <td id="phone">연락처</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>지갑 타입</td>
                          <td><label id="state" class="badge badge-success">승인</label></td>
                          <td>상태</td>
                          <td>
                            {{-- <span  class="fs-6 badge rounded-0 bg-blue">승인</span><!----> --}}
                            <label id="transfer_wallet" class="badge badge-danger">트랜스퍼</label>
                          </td><!---->
                        </tr>
                        <tr>
                          <td>등록일자</td>
                          <td id="regDate">2022-08-20 18:33:25</td>
                          <td>로그인일자</td>
                          <td id="loginAt">2023-06-30 05:09:01</td></tr>
                        <tr>
                          <td>API TOKEN</td>
                          <td>
                            <span id="api_token">2d2267b1-2990-46f2-bd69-e24da7de3ac4</span>
                            <i style="color: #b66dff; font-size: 1.125rem;" class="mdi mdi-content-copy"></i>
                          </td>
                          <td>API URL</td>
                          <td id="callback_url">https://api.purpleapi.com/api/v1</td>
                        </tr><!----><!----><!----><!---->
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="btnCreateAgent" class="btn btn-primary">
                      <i class="mdi mdi-heart-outline"></i>하부생성
                    </button>
                    <button type="button" class="btn btn-primary">
                      <i class="mdi mdi-calendar"></i>포인트지급/차감
                    </button>
                    <button type="button" class="btn btn-primary">
                      <i class="mdi mdi-clock"></i>비번변경
                    </button>
                  </div>
                  
                  <div id="dialog" title="하부생성" style="display:none">
                    <br>
                    <label for="name">소속 에이전트</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">닉네임</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">아이디</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">비밀번호</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">비밀번호 재입력</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">포인트요율(%)</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">에이전트권한</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
                    <br>
                    <label for="name">지갑타입</label>
                    <input type="text" class="form-control form-control-sm" id="strID" name="strID" value="" placeholder="에이전트명을 입력해주세요" >
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
        /////////////
        $( function() {
          $( "#dialog" ).dialog({
            autoOpen: false,
            height: 400,
            width: 350,
            modal: true,
            buttons: {
              "Save": function() {
                dialog.dialog( "close" );
              },
              Cancel: function() {
                dialog.dialog( "close" );
              }
            },
            close: function() {
              // form[ 0 ].reset();
              // allFields.removeClass( "ui-state-error" );
            }
          });
        });
        $( "#btnCreateAgent" ).on( "click", function() {
          $( "#dialog" ).dialog("open");
        });
        /////////////
        var treeView = $('#tree').treeview({
          // levels: 5,
          // backColor: "green", 
          // showCheckbox: true,
          // checkedIcon: 'mdi mdi-checkbox-marked-outline',
          // uncheckedIcon: 'mdi mdi-checkbox-blank-outline',
          expandIcon: 'mdi mdi-plus',
          collapseIcon: 'mdi mdi-minus',
          onNodeSelected: function (event, node){
            console.log(node.text, node.id)
            getTableInfo(node.id);
          }
          // data: tree
        });
        
        function getTree() {
          // var tree = [];

          action = "{{ route('user.agent.agentTree') }}";
          $.ajax({
            url: action,
            // data: formData,
            type: "GET",
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function ({status, data}) {
              if(status="success"){
                for (let index = 0; index < data.length; index++) {
                  const element = data[index];
                  // tree.push({text: element.nickname + `(${element.account})`, id: element.id}); 
                  var nodes = [{text: element.nickname + `(${element.account})`, id: element.id}];
                  nodes.push()
                  if(element.upper_id === 0){
                    treeView.treeview('addNode', [ nodes, false, , { silent: true } ]);
                  }
                  else{
                    var parent = treeView.treeview('findNodes', [element.upper_id, 'id'])[0];
                    treeView.treeview('addNode', [ nodes, parent, , { silent: true } ]);
                  }
                }
              }
            },
            error: function (data) {
              location.reload();
            }
          });
        }
        function getTableInfo(id = 0) {
          var action = "/agent/agentDetail/" + id;
          $.ajax({
            url: action,
            // data: formData,
            type: "GET",
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function ({status, data}) {
              if(status="success"){
                $('#account').html(data.account + `(${data.nickname})`)
                $('#regDate').html(data.created_at)
                $('#loginAt').html(data.login_at)
                $("#state").removeClass();
                $("#state").addClass(data.state == 0 ? "badge badge-warning" : data.state == 1 ? "badge badge-success" : "badge badge-danger")
                $('#state').html(data.state == 0 ? "대기" : data.state == 1 ? "승인" : "미승인")
                $('#token').html(data.token)
                $("#transfer_wallet").removeClass();
                $("#transfer_wallet").addClass(data.transfer_wallet == 0 ? "badge badge-warning" : "badge badge-danger");
                $('#transfer_wallet').html(data.transfer_wallet == 0 ? "심리스" : "트랜스퍼")
                $('#api_token').html(data.callback_token)
              }
            },
            error: function (data) {
              location.reload();
            }
          });
        }

        getTree();
        // $('#tree').treeview({
        //   // backColor: "green", 
        //   // showCheckbox: true,
        //   // checkedIcon: 'mdi mdi-checkbox-marked-outline',
        //   // uncheckedIcon: 'mdi mdi-checkbox-blank-outline',
        //   // expandIcon: 'mdi mdi-plus',
        //   // collapseIcon: 'mdi mdi-minus',
        //   data: getTree()
        // });
    </script>
@endpush