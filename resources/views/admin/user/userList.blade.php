@extends('admin.layouts.app')
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
                            <table id="Table" class="table table-hover table-bordered table-striped projects" cellspacing="0" width="100%">
                                
                            </table>
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
            ajax: {
                url: "{{ route('admin.user.users') }}",
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
                {title: "조작", data: 'id', name: 'updated_at', className: "text-center", width: "120px",
                    render: function (data, type, row) {
                        return `<button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-success btnEdit"><i class="fas fa-edit"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-warning btnDelete"><i class="fas fa-trash-alt"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-info btnPlay"><i class="fas fa-gamepad"></i></button>
                                <button style="font-size:10px !important;" data-id="${data}" class="btn btn-sm btn-info btnGameList"><i class="fas fa-list"></i></button>`;
                    }
                },
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#coinTable_wrapper .col-md-6:eq(0)');
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
                data: {userId},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        console.log(0);
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
    </script>
@endpush