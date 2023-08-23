@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 지급 내역 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">유저</a></li>
            <li class="breadcrumb-item active" aria-current="page">지급 내역</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              {{-- <h4 class="card-title">Striped Table</h4>
              <p class="card-description"> Add class <code>.table-striped</code>
              </p> --}}
              <div class="row ">
                <div class="col form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">소속에이전트아이디</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">유저아이디</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">유저 닉네임</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col-3 form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">기간</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                
                <div class="col form-group">
                    <button type="button" class="btn btn-gradient-success float-right" style="text-align:right ;float:right; right:0px;">검색</button>
                </div>
              </div>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th> 번호 </th>
                    <th> 주는 에이전트 </th>
                    <th> 받는 유저명 </th>
                    <th> 타입 </th>
                    <th> 지급 금액 </th>
                    <th> 지급전 잔액 </th>
                    <th> 지급후 잔액 </th>
                    <th> 지급 시각 </th>
                    <th> 상태 </th>
                    <th> 관리 </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                    </td>
                    <td> Herman Beck </td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td> $ 77.99 </td>
                    <td> May 15, 2015 </td>
                    <td> May 15, 2015 </td>
                    <td> May 15, 2015 </td>
                    <td> $ 77.99 </td>
                    <td>
                      <button type="button" class="btn btn-xs btn-gradient-primary me-2">수정</button>
                      <button type="button" class="btn btn-xs btn-gradient-danger">삭제</button>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
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
        
        $('body').on('click', '.btnEdit', function () {
            var userId = $(this).attr('data-id');
            window.open('/admin/user/edit/' + userId, '정보 수정', 'scrollbars=1, resizable=1, width=1000, height=620');
            return false;
        });
        $('body').on('change', '.chk-is-use', function () {
            var status = $(this).is(':checked') ? 1 : 0;
            if(!confirm('정식회원으로 등록하시겠습니까?')){$(this).prop('checked', status == 1 ? false : true);return}
            var userId = $(this).attr('data-id');
            var action = '/admin/user/state/' + userId;
            
            $.ajax({
                url: action,
                data: {status},
                type: "POST",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        refreshTable();
                        alert('정식회원으로 등록하였습니다.');
                    }else{
                        alert('정식회원등록에 실패하였습니다.');
                    }
                },
                error: function (data) {
                }
            });
        });
        // $('body').on('click', '.btnDelete', function () {
        //     if(!confirm('한번삭제한 회원정보는 되살릴수 없습니다. 정말삭제하시겠습니까?')){return}
        //     var userId = $(this).attr('data-id');
        //     var action = '/admin/user/edit/' + userId;
        //     $.ajax({
        //         url: action,
        //         data: {status},
        //         type: "DELETE",
        //         dataType: 'json',
        //         success: function ({status, data}) {
        //             if(status == "success"){
        //                 $('#userTable').DataTable().ajax.reload();
        //                 alert('회원을 삭제하였습니다.');
        //             }else{
        //                 alert('회원삭제에 실패하였습니다.');
        //             }
        //         },
        //         error: function (data) {
        //         }
        //     });
        // });
        // $('body').on('click', '.btnAdd', function () {
        //     window.open('/admin/user/edit/0', '회원추가', 'scrollbars=1, resizable=1, width=1000, height=620');
        //     return false;
        // });
        $('body').on('click', '.btnEditMember', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/user/edit/'+id, '정보 추가', 'scrollbars=1, resizable=1, width=800, height=620');
            return false;
        });
        $('body').on('click', '.btnGotoDeposit', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/cash/user_cash/0/'+id, '정보 추가', 'scrollbars=1, resizable=1, width=800, height=620');
            return false;
        });
        $('body').on('click', '.btnGotoWithdraw', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/cash/user_cash/1/'+id, '정보 추가', 'scrollbars=1, resizable=1, width=800, height=620');
            return false;
        });
        $('body').on('click', '.btnGotoTrading', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/calculate/user_trading/'+id, '정보 추가', 'scrollbars=1, resizable=1, width=800, height=620');
            return false;
        });
        $('body').on('click', '.btnGotoResult', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/calculate/user_result/'+id, '정보 추가', 'scrollbars=1, resizable=1, width=800, height=620');
            return false;
        });
        function refreshTable() {
            $('#userTable').DataTable().ajax.reload();
        }
    </script>
@endpush