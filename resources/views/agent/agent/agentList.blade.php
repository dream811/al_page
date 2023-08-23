@extends('agent.layouts.app')
{{-- @push('scripts')
    <script src="/example.js"></script>
@endpush --}}
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 에이전트 목록 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">에이전트</a></li>
            <li class="breadcrumb-item active" aria-current="page">에이전트 목록</li>
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
                <div class="col-3 form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="filter-input input-group-text">소속에이전트아이디</span>
                    </div>
                    <input type="text" class="filter-input form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="filter-input input-group-text">유저아이디</span>
                    </div>
                    <input type="text" class="filter-input form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="filter-input input-group-text" >유저닉네임</span>
                    </div>
                    <input type="text" class="filter-input form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                  <button type="button" class="btn btn-gradient-success float-right" style="text-align:right ;float:right; right:0px;">검색</button>
                </div>
              </div>
			  <style>
				.text-right{
					text-align: right !important;
				}
			  </style>
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


        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            // searching: false,
            scrollY: "100%",
            ajax: {
                url: "{{ route('agent.agent.agentList') }}"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, 'searchable' : false, 'exportable' : false, 'printable'  : true, width:'30px'},
                {title: "소속에이전트", data: 'upper', name: 'upper'},
                {title: "에이전트", data: 'account', name: 'account'},
                {title: "에이전트등급", data: 'level_id', name: 'level_id'},
                {title: "보유포인트", data: 'balance', name: 'balance', className: 'text-right'},
                {title: "보유캐쉬", data: 'cash', name: 'cash', className: 'text-right'},
                {title: "포인트요율", data: 'commission_rate', name: 'commission_rate', className: 'text-right'},
                {title: "상태", data: 'state', name: 'state',
					render: function (data, type, row) {
						if(data == 1){
							return "승인";
						}else if(data == 2){
							return "미승인";
						}
						
                    }
				},
                {title: "등록일", data: 'created_at', name: 'created_at',
                    render: function (data, type, row) {
						var date = new Date(data);
						return moment(data).format('YYYY-MM-DD  HH:mm:ss');
                    }
                },
                
                // {title: "처리금액", data: 'action', name: 'action', width: '140px', orderable:false, searchable: false, className: "text-center"},
            ],
			columnDefs:[
				{
					targets: 4,
					render: $.fn.dataTable.render.number(',', '.', 0, 'P')
				},
				{
					targets: 5,
					render: $.fn.dataTable.render.number(',', '.', 0, '$')
				},
				{
					targets: 6,
					render: $.fn.dataTable.render.number(',', '.', 0, '')
				}
			],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#userTable_wrapper .col-md-6:eq(0)');



        // $('body').on('change', '.chk-is-use', function () {
        //     var status = $(this).is(':checked') ? 1 : 0;
        //     if(!confirm('정식회원으로 등록하시겠습니까?')){$(this).prop('checked', status == 1 ? false : true);return}
        //     var userId = $(this).attr('data-id');
        //     var action = '/admin/user/state/' + userId;
            
        //     $.ajax({
        //         url: action,
        //         data: {status},
        //         type: "POST",
        //         dataType: 'json',
        //         success: function ({status, data}) {
        //           if(status == "success"){
        //               refreshTable();
        //               alert('정식회원으로 등록하였습니다.');
        //           }else{
        //               alert('정식회원등록에 실패하였습니다.');
        //           }
        //       },
        //       error: function (data) {
        //       }
        //     });
        // });
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
            $('#Table').DataTable().ajax.reload();
        }
    </script>
@endpush