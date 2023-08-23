@extends('agent.layouts.app')
@section('content')
    <div class="content-wrapper">
      
	  <div class="page-header">
		<h3 class="page-title" style="font-weight:bold">
		  <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
			<i class="mdi mdi-gamepad-variant"></i>
		  </span> 게임내역
		</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">게임내역</a></li>
				<li class="breadcrumb-item active" aria-current="page">게임내역</li>
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
                url: "{{ route('agent.game.gameHistory') }}",
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
                {title: "트랜잭션ID", data: 'transaction_id', name: 'transaction_id', className: "text-center"},
                {title: "소속에이전트", data: 'agent', name: 'agent', className: "text-center"},
                {title: "유저", data: 'account', name: 'account', className: "text-center"},
                {title: "타입", data: 'type', name: 'type', className: "text-center"},
                {title: "상태", data: 'state', name: 'state', className: "text-center"},
                {title: "벤더", data: 'vendor', name: 'vendor', className: "text-center"},
                {title: "게임", data: 'game', name: 'game', className: "text-center"},
                {title: "처리금액", data: 'amount', name: 'amount', className: "text-center"},
                {title: "이전금액", data: 'before', name: 'before', className: "text-center"},
                {title: "요청일", data: 'processed_at', name: 'processed_at', className: "text-center"},
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