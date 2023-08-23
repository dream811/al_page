@extends('agent.layouts.app')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 벤더목록 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">벤더</a></li>
            <li class="breadcrumb-item active" aria-current="page">벤더 목록</li>
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
                url: "{{ route('agent.vendor.vendors') }}",
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
                {title: "로고", data: 'image', name: 'image', className: "text-center"},
                {title: "벤더 Key", data: 'vendor_key', name: 'vendor_key', className: "text-center"},
                {title: "카테고리", data: 'category', name: 'category', className: "text-center"},
                {title: "로비키별 상한금액", data: 'name', name: 'name', className: "text-center"},
                {title: "제로윈여부", data: 'zero_win', name: 'zero_win', className: "text-center"},
                {title: "점검여부", data: 'maintenance', name: 'maintenance', className: "text-center"},
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