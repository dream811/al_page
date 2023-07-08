@extends('user.layouts.app')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 유저 목록 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">유저</a></li>
            <li class="breadcrumb-item active" aria-current="page">유저목록</li>
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
                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
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
                      <span class="input-group-text">유저닉네임</span>
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
                    <th> 소속에이전트 </th>
                    <th> 유저 </th>
                    <th> 금월 베팅금 </th>
                    <th> 금월 당첨금 </th>
                    <th> 금월 손익금 </th>
                    <th> 현재 보유금 </th>
                    <th> 현재 보유포인트 </th>
                    <th> 가입시각 </th>
                    <th> 최근 접속시각 </th>
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
               --}}
               {{-- <td>
                <label class="badge badge-info">On hold</label>
              </td>
              <td>
                <button class="btn btn-outline-primary btn-xs">View</button>
              </td> --}}
              <table id="Table" class="table dataTable no-footer table-hover table-striped text-xs" aria-describedby="order-listing_info" cellspacing="0" width="100%">
                                
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
        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "620px",
            searching: false,
            pageLength: 100,
            ajax: {
                url: "{{ route('user.ruser.users') }}",
                // data: function ( d ) {
                //     d.txtFrom   = $('#txtFrom').val();
                //     d.txtTo     = $('#txtTo').val();
                //     d.txtType   = $('#txtUser').val();
                // },
                error: function(xhr, error, thrown) {
                    if(xhr.status == 401){
                      location.reload();
                    }
                }
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, width: '50px', 'searchable' : false, 'exportable' : false, 'printable'  : true},
                {title: "소속에이전트", data: 'agent', name: 'agent', className: "text-center"},
                {title: "유저", data: 'account', name: 'account', className: "text-center"},
                {title: "보유금액", data: 'balance', name: 'balance', className: "text-center"},
                {title: "가입일", data: 'created_at', name: 'created_at', className: "text-center"},
                {title: "최근접속일", data: 'login_at', name: 'login_at', className: "text-center"},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
        $('body').on('click', '.btnSearch', function () {
            refreshTable();
        });
        
        function refreshTable() {
            $('#Table').DataTable().ajax.reload();
        }
    </script>
@endpush