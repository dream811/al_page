@extends('agent.layouts.app')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 트랜잭션 내역 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">유저</a></li>
            <li class="breadcrumb-item active" aria-current="page">트랜잭션 내역</li>
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
                <div class="col-3 form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="filter-input input-group-text">기간</span>
                    </div>
                    <input type="text" class="filter-input form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    <input type="text" class="filter-input form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="filter-input input-group-text">번호</span>
                    </div>
                    <input type="text" class="filter-input form-control form-control-sm" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="col form-group">
                    <button type="button" class="filter-input btn btn-gradient-success float-right" style="text-align:right ;float:right; right:0px;">검색</button>
                </div>
              </div>
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
        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "620px",
            searching: false,
            pageLength: 100,
            ajax: {
                url: "{{ route('agent.ruser.transactions') }}",
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
                {title: "타입", data: 'type', name: 'type', className: "text-center"},
                {title: "처리금액", data: 'amount', name: 'amount', className: "text-center"},
                {title: "이전금액", data: 'before', name: 'before', className: "text-center"},
                {title: "처리일", data: 'processed_at', name: 'processed_at', className: "text-center"},
                
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