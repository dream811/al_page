@extends('user.layouts.app')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 캐쉬 트랜잭션내역 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">에이전트</a></li>
            <li class="breadcrumb-item active" aria-current="page">캐쉬 트랜잭션내역</li>
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
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">번호</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                    <button type="button" class="btn btn-gradient-success float-right" style="text-align:right ;float:right; right:0px;">검색</button>
                </div>
              </div>
              {{-- <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th> 번호 </th>
                    <th> 에이전트/유저 </th>
                    <th> 게임 </th>
                    <th> 베팅시각 </th>
                    <th> 처리시각 </th>
                    <th> 유저 베팅 </th>
                    <th> 게임 결과 </th>
                    <th> 금액 </th>
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
              </table> --}}
              <table id="Table" class="table dataTable no-footer table-hover table-striped text-xs" aria-describedby="order-listing_info" cellspacing="0" width="100%">
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
        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            // searching: false,
            scrollY: "100%",
            ajax: {
                url: "{{ route('user.agent.cashHistory') }}"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, 'searchable' : false, 'exportable' : false, 'printable'  : true, width:'30px'},
                {title: "에이전트", data: 'agent_id', name: 'agent_id'},
                {title: "대상자", data: 'on_agent_id', name: 'on_agent_id'},
                {title: "신청트랜잭션ID", data: 'request_id', name: 'request_id', className: "text-center", width: '60px'},
                {title: "게임트랜잭션ID", data: 'transaction_id', name: 'transaction_id', className: "text-center", width: '60px'},
                {title: "타입", data: 'type', name: 'type', className: "text-center", width: '60px',
					render: function (data, type, row) {
						if (row.type == "deposit") {
							return `<span style="color:blue" >입금</span>`;
						} else {
							return `<span style="color:red" >출금</span>`;
						}
					}
                },
                {title: "서브타입", data: 'sub_type', name: 'sub_type', className: "text-center", width: '60px',
                    render: function (data, type, row) {
                        if (row.sub_type == "a_deposit") {
                            return `<span style="color:blue" >자동입금</span>`;
                        } else if (row.type == "a_withdraw") {
                            return `<span style="color:red" >자동출금</span>`;
                        } else if (row.type == "m_withdraw") {
                            return `<span style="color:red" >수동출금</span>`;
                        } else if (row.type == "m_withdraw") {
                            return `<span style="color:red" >수동출금</span>`;
                        }
                    }
                },
                {title: "처리금액", data: 'balance', name: 'balance', className: "text-center", width: '60px'},
                {title: "이전금액", data: 'before_balance', name: 'before_balance', className: "text-center", width: '60px'},
                {title: "현재금액", data: 'after_balance', name: 'after_balance', className: "text-center", width: '60px'},
                {title: "비고", data: 'description', name: 'description', className: "text-center", width: '60px'},
                {title: "처리일", data: 'updated_at', name: 'updated_at', className: "text-center", width: '60px'},
                // {title: "처리금액", data: 'action', name: 'action', width: '140px', orderable:false, searchable: false, className: "text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#userTable_wrapper .col-md-6:eq(0)');

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
       
        function refreshTable() {
            $('#userTable').DataTable().ajax.reload();
        }
    </script>
@endpush