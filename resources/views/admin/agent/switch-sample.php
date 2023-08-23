@extends('admin.layouts.app')
@section('third_party_stylesheets')
{{-- <link rel="stylesheet" href="{{asset('plugins/jquery-tableTree/css/jquery.treetable.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-tableTree/css/jquery.treetable.theme.default.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-tableTree/css/screen.css')}}"> --}}
<link rel="stylesheet" href="{{asset('plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css')}}">
<style>
    /* body { background-color:#fafafa; font-family:'Open Sans';} */
    .container { margin:150px auto;}
    .treegrid-indent {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
    }

    .treegrid-expander {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
        left:-17px;
        cursor: pointer;
    }
</style>
@endsection
@section('third_party_scripts')
<script src="{{asset('plugins/jquery-tree/js/tree.js?v=4')}}"></script>
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.js')}}"></script>
{{-- <script src="{{asset('plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js')}}"></script>
<script src="{{asset('plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js')}}"></script> --}}


@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User Management</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        
                        {{-- <ul class="nav float-right">
                            <li class="pull-right float-right pr-1 pt-1" style="">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm btnAdd" >New</a>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-3">
                                <div class="card card-row card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title" style="font-size: 15px; font-weight: bold;">에이전트</h3>
                                    </div>
                                    <style>
                                        .nav-pills .nav-item.active > a {
                                            color: #007bff;
                                        }
                                    </style>
                                    <div class="card-body p-0" id="agentPanel" style="overflow: auto" >
                                        <ul class="nav nav-pills flex-column" >
                                            @foreach ($agents as $agent)
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> {{$agent->account}}
                                                <span class="badge bg-primary float-right">{{$agent->account}}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                            <li class="nav-item active">
                                                <a href="#" class="nav-link">
                                                    <i class="fas fa-home"></i> asdf
                                                <span class="badge bg-primary float-right">asdf</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title" style="font-size: 15px; font-weight: bold;">영상사</h3>
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        <ul class="nav nav-pills flex-column" >
                                            @foreach ($vcompanies as $company)
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> {{$company->name}}
                                                <span class="float-right">
                                                    {{-- <div class="form-group mb-0">
                                                        <div class="custom-control custom-switch">
                                                          <input type="checkbox" class="custom-control-input" id="{{$company->name}}">
                                                          <label class="custom-control-label" for="{{$company->name}}"></label>
                                                        </div>
                                                    </div> --}}
                                                </span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        {{-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-size="mini" data-handle-width="22" data-on-color="success"> --}}
                                        <script>
                                            
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title" style="font-size: 15px; font-weight: bold;">게임사</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="nav nav-pills flex-column">
                                            @foreach ($gcompanies as $company)
                                            <li class="nav-item active">
                                                <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> 프라그마틱
                                                <span class="float-right">
                                                    <div class="form-group mb-0">
                                                        <div class="custom-control custom-switch">
                                                          <input type="checkbox" class="custom-control-input" id="{{$company->name}}">
                                                          <label class="custom-control-label" for="{{$company->name}}"></label>
                                                        </div>
                                                      </div>
                                                </span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- <div class="col-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title" style="font-size: 15px; font-weight: bold;">게임(슬롯, 카지노)</h3>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                        
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
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
        $("[name='my-checkbox']").bootstrapSwitch();
        // $("#example-advanced").treetable({ expandable: true });

        // Highlight selected row
        // $("#example-advanced tbody").on("mousedown", "tr", function() {
        //     $(".selected").not(this).removeClass("selected");
        //     $(this).toggleClass("selected");
        // });

        // // Drag & Drop Example Code
        // $("#example-advanced .file, #example-advanced .folder").draggable({
        //     helper: "clone",
        //     opacity: .75,
        //     refreshPositions: true, // Performance?
        //     revert: "invalid",
        //     revertDuration: 300,
        //     scroll: true
        // });

        // $("#example-advanced .folder").each(function() {
        //     $(this).parents("#example-advanced tr").droppable({
        //     accept: ".file, .folder",
        //     drop: function(e, ui) {
        //         var droppedEl = ui.draggable.parents("tr");
        //         $("#example-advanced").treetable("move", droppedEl.data("ttId"), $(this).data("ttId"));
        //     },
        //     hoverClass: "accept",
        //     over: function(e, ui) {
        //         var droppedEl = ui.draggable.parents("tr");
        //         if(this != droppedEl[0] && !$(this).is(".expanded")) {
        //         $("#example-advanced").treetable("expandNode", $(this).data("ttId"));
        //         }
        //     }
        //     });
        // });

        // $("form#reveal").submit(function() {
        //     var nodeId = $("#revealNodeId").val()

        //     try {
        //     $("#example-advanced").treetable("reveal", nodeId);
        //     }
        //     catch(error) {
        //     alert(error.message);
        //     }

        //     return false;
        // });
        var table = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "620px",
            searching: false,
            pageLength: 100,
            paging: false,
            scrollCollapse: true,
            scrollX: true,
            fixedColumns: {
                left: 1
            },
            ajax: {
                url: "{{ route('admin.agent.agents') }}",
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
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, width: '100px', 'searchable' : false, 'exportable' : false, 'printable'  : true},
                // {title: "소속에이전트", data: 'agent', name: 'agent', className: "text-center"},
                {title: "유저", data: 'account', name: 'account', className: "text-center"},
                {title: "보유금액", data: 'balance', name: 'balance', className: "text-center"},
                {title: "가입일", data: 'created_at', name: 'created_at', className: "text-center"},
                {title: "최근접속일", data: 'login_at', name: 'login_at', className: "text-center"},
                {title: "최근접속일", data: 'account_number', name: 'account_number', className: "text-center"},
                {title: "최근접속일", data: 'account_holder', name: 'account_holders', className: "text-center"},
                {title: "최근접속일", data: 'email', name: 'email', className: "text-center"},
                {title: "최근접속일", data: 'cash', name: 'cash', className: "text-center"},
                {title: "조작", data: 'uuid', name: 'updated_at', className: "text-center", width: "120px",
                    render: function (data, type, row) {
                        return `<button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-success btnEdit"><i class="fas fa-edit"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-warning btnDelete"><i class="fas fa-trash-alt"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-info btnPlay"><i class="fas fa-gamepad"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-info btnGameList"><i class="fas fa-list"></i></button>`;
                    }
                },
            ],
            "createdRow": function( row, data, dataIndex ) {
                
                $(row).attr('data-id', data.id );
                $(row).attr('data-parent', data.upper_id );
                $(row).attr('data-level', data.upper_id+1 );
                
            },
            // responsive: true, lengthChange: true,
            "fnInitComplete":function(){
                //console.log('here');
                makeTree();
                // alert("Completed");
            },
            buttons: ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#Table_wrapper .col-md-6:eq(0)');
        
        $('body').on('click', '.btnSearch', function () {
            refreshTable();
        });

        
        
        $('body').on('click', '.btnEdit', function () {
            var userId = $(this).attr('data-id');
            window.open('/admin/user/edit/' + userId, 'Edit Info', 'scrollbars=1, resizable=1, width=1000, height=620');
            return false;
        });

        $('body').on('click', '.btnPlay', function () {
            var userId = $(this).attr('data-id');
            
            // if(!confirm('You really want to play game?-->'+ userId)){return}
            
            var action = "http://devall77.com/api/v1/launchGame";//http://devall77.com/api/v1/b4b/Seamless/GameResult
            // var action = "http://devall77.com/api/v1/b4b/Seamless/GameResult";//http://devall77.com/api/v1/b4b/Seamless/GameResult
            $.ajax({
                url: action,
                data: {status},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        //alert('Successfully changed.');
                        window.open(data.Url, 'Game', 'scrollbars=1, resizable=1, width=1000, height=820');
                    }else{
                        // alert('Failed to launch game.');
                    }
                },
                error: function (data) {
                }
            });

        });

        $('body').on('click', '.btnGameList', function () {
            var userId = $(this).attr('data-id');
            
            //if(!confirm('You really want to play game?-->'+ userId)){return}
            
            var action = "http://devall77.com/api/v1/getGameList";
            $.ajax({
                url: action,
                data: {status},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        //alert('Successfully changed.');
                        window.open(data.Url, 'Game', 'scrollbars=1, resizable=1, width=1000, height=820');
                    }else{
                        alert('Failed to launch game.');
                    }
                },
                error: function (data) {
                }
            });

        });

        $('body').on('change', '.chk-is-use', function () {
            var status = $(this).is(':checked') ? 1 : 0;
            if(!confirm('Do you want to change the state?')){$(this).prop('checked', status == 1 ? false : true);return}
            var userId = $(this).attr('data-id');
            var action = '/admin/user/state/' + userId;
            
            $.ajax({
                url: action,
                data: {status},
                type: "POST",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        alert('Successfully changed.');
                    }else{
                        alert('Failed to change.');
                    }
                },
                error: function (data) {
                }
            });
        });
        $('body').on('click', '.btnDelete', function () {
            if(!confirm('You really want to delete this user?')){return}
            var userId = $(this).attr('data-id');
            var action = '/admin/user/edit/' + userId;
            $.ajax({
                url: action,
                data: {status},
                type: "DELETE",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        $('#userTable').DataTable().ajax.reload();
                        alert('Successfully removed.');
                    }else{
                        alert('Failed to remove');
                    }
                },
                error: function (data) {
                }
            });
        });
        $('body').on('click', '.btnAdd', function () {
            window.open('/admin/user/edit/0', 'Add Member', 'scrollbars=1, resizable=1, width=700, height=620');
            return false;
        });
        $('body').on('click', '.btnEditMember', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/user/edit/'+id, '정보 추가', 'scrollbars=1, resizable=1, width=800, height=620');
            return false;
        });
        
        function refreshTable() {
            $('#userTable').DataTable().ajax.reload();
        }

        $('#agentPanel').overlayScrollbars({
            // overflow: {
            //     // x: 'hidden',
            // },
        });

    </script>
@endpush