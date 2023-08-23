@extends('admin.layouts.app')
@section('third_party_stylesheets')
{{-- <link rel="stylesheet" href="{{asset('plugins/jquery-tableTree/css/jquery.treetable.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-tableTree/css/jquery.treetable.theme.default.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-tableTree/css/screen.css')}}"> --}}
{{-- <link rel="stylesheet" href="{{asset('plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css')}}"> --}}
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
                        {{-- <form id="divUserForm"> --}}
                            <style>
                                .dataTables_scrollHeadInner table thead tr th {
                                    padding-top: 0.75rem !important;
                                    padding-bottom: 0.75rem !important;
                                }
                            </style>
                            <table id="Table" class="table table-hover table-bordered table-striped projects" cellspacing="0" width="100%">
                            </table>
                            
                            
                            
                            {{-- <table id="example-advanced"  class="table table-hover table-bordered table-striped projects">
                                
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Kind</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-tt-id='1'><td><span class='file'>Acknowledgements.rtf</span></td><td>File</td><td>480.95 KB</td></tr>
                                    <tr data-tt-id='2'><td><span class='folder'>CHUD</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-1' data-tt-parent-id='2'><td><span class='folder'>amber</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-1-1' data-tt-parent-id='2-1'><td><span class='file'>AmberTraceFormats.pdf</span></td><td>File</td><td>124.46 KB</td></tr>
                                    <tr data-tt-id='2-2' data-tt-parent-id='2'><td><span class='folder'>BigTop</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-2-1' data-tt-parent-id='2-2'><td><span class='file'>BigTopUserGuide.pdf</span></td><td>File</td><td>1314.71 KB</td></tr>
                                    <tr data-tt-id='2-3' data-tt-parent-id='2'><td><span class='folder'>Saturn</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-3-1' data-tt-parent-id='2-3'><td><span class='file'>SaturnUserGuide.pdf</span></td><td>File</td><td>694.29 KB</td></tr>
                                    <tr data-tt-id='2-4' data-tt-parent-id='2'><td><span class='folder'>Shark</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-4-1' data-tt-parent-id='2-4'><td><span class='file'>SharkUserGuide.pdf</span></td><td>File</td><td>12902.51 KB</td></tr>
                                    <tr data-tt-id='2-5' data-tt-parent-id='2'><td><span class='folder'>simg4</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-6' data-tt-parent-id='2'><td><span class='folder'>simg4_plus</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='2-7' data-tt-parent-id='2'><td><span class='folder'>simg5</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='3'><td><span class='folder'>DocSets</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='3-1' data-tt-parent-id='3'><td><span class='folder'>com.apple.ADC_Reference_Library.CoreReference.docset</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='3-1-1' data-tt-parent-id='3-1'><td><span class='folder'>Contents</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='3-1-1-1' data-tt-parent-id='3-1-1'><td><span class='file'>Info.plist</span></td><td>File</td><td>1.23 KB</td></tr>
                                    <tr data-tt-id='3-1-1-2' data-tt-parent-id='3-1-1'><td><span class='folder'>Resources</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='7'><td><span class='folder'>RubyCocoa</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='8'><td><span class='folder'>wxWidgets</span></td><td>Folder</td><td>--</td></tr>
                                    <tr data-tt-id='9'><td><span class='file'>Xcode Tools License.rtf</span></td><td>File</td><td>18.79 KB</td></tr>
                                </tbody>
                            </table> --}}
                        
                            {{-- <table id="tree-table" class="table table-hover table-bordered">
                                <tbody>
                                    <th>#</th>
                                    <th>Test</th>
                                    <tr data-id="1" data-parent="0" data-level="1">
                                        <td data-column="name">Node 1</td>
                                        <td>Additional info</td>
                                    </tr>
                                    <tr data-id="2" data-parent="1" data-level="2">
                                        <td data-column="name">Node 1</td>
                                        <td>Additional info</td>
                                    </tr>
                                    <tr data-id="3" data-parent="1" data-level="2">
                                        <td data-column="name">Node 1</td>
                                        <td>Additional info</td>
                                    </tr>
                                    <tr data-id="4" data-parent="3" data-level="3">
                                        <td data-column="name">Node 1</td>
                                        <td>Additional info</td>
                                    </tr>
                                    <tr data-id="5" data-parent="3" data-level="3">
                                        <td data-column="name">Node 1</td>
                                        <td>Additional info</td>
                                    </tr>
                                </tbody>
                                
                            </table> --}}
                        {{-- </form> --}}
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
                // {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, width: '100px', 'searchable' : false, 'exportable' : false, 'printable'  : true},
                // {title: "소속에이전트", data: 'agent', name: 'agent', className: "text-center"},
                {title: "유저", data: 'account', name: 'account', className: "py-0 text-center", orderable  : false, width: "400px", className: "text-left"},
                {title: "보유칩", data: 'balance', name: 'balance', className: "text-center py-0", orderable  : false,
                    // render: $.fn.dataTable.render.number(',', '.', 0, '')
                    render: function (data, type, row) {
                        return `<div style="text-align: right">`+new Intl.NumberFormat('en-US').format(data)+`</div>`;
                    }
                },
                {title: "가입일", data: 'created_at', name: 'created_at', className: "text-center py-0", orderable  : false, width:"140px",
                    render: function (data, type, row) {
                        return moment(data).format("YYYY-MM-DD HH:mm:ss");
                    }
                },
                {title: "최근접속일", data: 'login_at', name: 'login_at', className: "text-center py-0", orderable  : false, width:"140px",
                    render: function (data, type, row) {
                        return moment(data).format("YYYY-MM-DD HH:mm:ss");
                    }
                },
                {title: "은행비번", data: 'account_number', name: 'account_number', className: "text-center py-0", orderable  : false},
                {title: "은행주", data: 'account_holder', name: 'account_holders', className: "text-center py-0", orderable  : false},
                {title: "이메일", data: 'email', name: 'email', className: "text-center py-0", orderable  : false, width:"140px",}, 
                {title: "보유머니", data: 'cash', name: 'cash', className: "text-center py-0", orderable  : false,
                    render: function (data, type, row) {
                        return `<div style="text-align: right">`+new Intl.NumberFormat('en-US').format(data)+`</div>`;
                    }
                },
                {title: "조작", data: 'id', name: 'updated_at', className: "text-center py-0", width: "140px", orderable  : false,
                    render: function (data, type, row) {
                        return `<button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-success btnEdit"><i class="fas fa-edit"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-warning btnDelete"><i class="fas fa-trash-alt"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-info btnGetInfo"><i class="fas fa-gamepad"></i></button>
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
            scrollCollapse: true,
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
            var id = $(this).attr('data-id');
            window.open('/admin/agent/agentDetail/' + id, 'Edit Info', 'scrollbars=1, resizable=1, width=1200, height=620');
            return false;
        });

        $('body').on('click', '.btnGetInfo', function () {
            var agentId = $(this).attr('data-id');
            
            // if(!confirm('You really want to play game?-->'+ userId)){return}
            
            var action = "http://devall77.com/api/v1/getAgentInfo";//http://devall77.com/api/v1/b4b/Seamless/GameResult
            // var action = "http://devall77.com/api/v1/b4b/Seamless/GameResult";//http://devall77.com/api/v1/b4b/Seamless/GameResult
            $.ajax({
                url: action,
                data: {agentId},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        console.log(data);
                        //window.open(data.Url, 'Game', 'scrollbars=1, resizable=1, width=1000, height=820');
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
    </script>
@endpush