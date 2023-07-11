@extends('user.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title" style="font-weight:bold">
              <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
                <i class="mdi mdi-xbox-controller-off"></i>
              </span> 베팅제한
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">게임</a></li>
                    <li class="breadcrumb-item active" aria-current="page">베팅제한</li>
                </ol>
            </nav>
        </div>

      
      
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table bg-light">
                        <tbody>
                            <tr class="bg-light mb-1" style="border-bottom:1px;">
                                <th style="width:20%">검색(소속에이전트)</th>
                                <td colspan="3">
                                  <div class="input-group " >
                                    <input type="text" class="filter-input form-control " placeholder="전역설정" aria-label="전역설정" aria-describedby="basic-addon2">
                                  </div>
                                </td>
                                <td>
                                    <button class="filter-input btn btn-success">검색</button>
                                </td>
                            </tr>
                            <tr  class="bg-light">
                                <th style="width:20%">전역 설정</th>
                                <td colspan="3">
                                <div class="input-group " >
                                    <input type="text" class="filter-input form-control " placeholder="전역설정" aria-label="전역설정" aria-describedby="basic-addon2">
                                </div>
                                </td>
                                <td>
                                    <button class="filter-input btn btn-primary">보관</button>
                                </td>
                            </tr>
                            <tr  class="bg-light">
                                <th style="width:20%">벤더별 설정</th>
                                <td>
                                <div class="input-group " >
                                    <div class="form-group mb-0" >
                                        <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id0" id="receiver_id0">
                                          <option selected value="">asdf</option>
                                          <option value="ccc">ccc</option>
                                        </select>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <div class="input-group " >
                                    <input type="text" class="filter-input form-control " placeholder="금액" aria-label="금액" aria-describedby="basic-addon2">
                                </div>
                                </td>
                                <td></td>
                                <td>
                                    <button class="filter-input btn btn-primary">보관</button>
                                </td>
                            </tr>
                            <tr class="bg-light">
                                <th style="width:20%">게임별 설정</th>
                                <td>
                                    <div class="input-group " >
                                        <div class="form-group mb-0" >
                                            <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id1" id="receiver_id1">
                                              <option selected value="">asdf</option>
                                              <option value="ccc">ccc</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group " >
                                        <div class="form-group mb-0" >
                                            <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id2" id="receiver_id2">
                                              <option selected value="">asdf</option>
                                              <option value="ccc">ccc</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group " >
                                    <input type="text" class="filter-input form-control " placeholder="금액" aria-label="금액" aria-describedby="basic-addon2">
                                    </div>
                                </td>
                                <td>
                                    <button class="filter-input btn btn-primary">보관</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
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
        
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        
        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "620px",
            searching: false,
            pageLength: 100,
            ajax: {
                url: "{{ route('user.game.betLimit') }}",
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
                {title: "타입", data: 'type', name: 'type', className: "text-center"},
                {title: "벤더 key", data: 'vendor_key', name: 'vendor_key', className: "text-center"},
                {title: "게임 key", data: 'game_key', name: 'game_key', className: "text-center"},
                {title: "게임명", data: 'game_name', name: 'game_name', className: "text-center"},
                {title: "최대 베팅금", data: 'max_bet', name: 'max_bet', width:"150px", className: "text-center",
                    render: function (data, type, row) {
                        return `<input type='text' style="text-align:right;" class='m-0 filter-input form-control' value='${row.max_bet}' />`;
                    }
                },
                {title: "등록일", data: 'created_at', name: 'created_at', className: "text-center"},
                {title: "수정일", data: 'updated_at', name: 'updated_at', className: "text-center"},
                {title: "조작", data: 'id', name: 'updated_at', className: "text-center",
                    render: function (data, type, row) {
                        return `<button class="filter-input btn btn-primary">수정</button><button class="filter-input btn btn-danger">삭제</button>`;
                    }
                },
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