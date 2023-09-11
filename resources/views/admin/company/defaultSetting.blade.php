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
                    <li class="breadcrumb-item"><a href="#">Company</a></li>
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
                <div class="card card-primary card-outline card-tabs" style="height:790px">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav float-right">
                            <li class="pull-right float-right pr-4 pt-1" style="">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm btnAdd" >보관</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title" style="font-size: 15px; font-weight: bold;">게임사</h3>
                                    </div>
                                    <div class="card-body p-0" id="gcompanyPanel" style="height:700px;">
                                        <ul class="nav nav-pills flex-column gcompanyList">
                                            {{-- <li class="nav-item active" data-id="ㅏ">
                                                <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> 이름
                                                <span class="float-right">
                                                    <div class="form-group mb-0">
                                                        <div class="custom-control custom-switch">
                                                            <span>사용/미사용</span>
                                                            <span>수정</span>
                                                        </div>
                                                    </div>
                                                </span>
                                                </a>
                                            </li> --}}
                                            @foreach ($gcompanies as $company)
                                            <li class="nav-item active gcompany" data-id="{{$company->id}}">
                                                <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> {{$company->name}}
                                                {{-- <span class="float-right">
                                                    <div class="form-group mb-0">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input chk-is-use" id="{{$company->name}}">
                                                            <label class="custom-control-label" for="{{$company->name}}"></label>

                                                            <button class="btn btn-xs btn-primary">보관</button>
                                                        </div>
                                                    </div>
                                                </span> --}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                      <h3 class="card-title" style="font-size: 15px; font-weight: bold;">영상사</h3>
                                    </div>
                                    
                                    <div class="card-body p-0" id="vcompanyPanel" style="height:700px;">
                                        <ul class="nav nav-pills flex-column vcompanyList" >
                                            @foreach ($vcompanies as $company)
                                            <li class="nav-item vcompany" data-id="{{$company->key}}">
                                                <a href="#" class="nav-link">
                                                <i class="fas fa-inbox"></i> {{$company->name}}
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
                                        {{-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-size="mini" data-handle-width="22" data-on-color="success"> --}}
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
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
        
        // $('body').on('click', '.gcompany', function () {
        //     var agentId = $(this).attr('data-id');
        //     $('.gcompany.active').removeClass('active');
        //     $(this).addClass('active');
        //     // $('.agent.active').removeClass('active');
        //     $('.gcompany.active').removeClass('active');
        //     var html =`<li class="nav-item">
        //         <a href="#" class="nav-link">
        //         기본설정으로 이용될 게임사를 선택하세요
        //         <span class="float-right">
                
        //         </span>
        //         </a>
        //     </li>`
        //     $('.gcompanyList').html(html);
        // });

        $('body').on('click', '.gcompany', function () {
            var companyKey = $(this).attr('data-id');
            
            $('.gcompany.active').removeClass('active');
            $(this).addClass('active');
            var action = '/admin/vcompany/games';
            
            $.ajax({
                url: action,
                data: {companyKey, agentId},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        console.log(data);
                        $('.gameList').html('');
                        if(data.length == 0){
                            var html =`<li class="nav-item">
                                <a href="#" class="nav-link">
                                자료가 없습니다
                                <span class="float-right">
                                </span>
                                </a>
                            </li>`
                            $('.gameList').html(html);
                        }else{
                            data.forEach( (element, index) => {
                                var checked = "";
                                if(element.game_status != null){
                                    checked = element.game_status.status == 1 ? "checked" : "";
                                }
                                var html =`<li class="nav-item" data-id="${element.id}">
                                    <a href="#" class="nav-link">
                                    <i class="fas fa-chess"></i> ${element.name}
                                    <span class="float-right" >
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-switch">
                                                <!-- <label style="text-align:right;width:200px;cursor: pointer;padding-right: 40px;>${element.name}</label>-->
                                                <input type="checkbox" class="custom-control-input chk-is-use" ${checked} data-id="${element.id}" id="${element.name}">
                                                <label class="custom-control-label" for="${element.name}"></label>
                                                <button class="btn btn-xs btn-primary">설정</button>
                                            </div>
                                        </div>
                                    </span>
                                    </a>
                                </li>`;
                                $('.gameList').append(html); 
                            });
                        }
                        
                        
                    }else{
                        //alert('Failed to change.');
                    }
                },
                error: function (data) {
                }
            });
        });

        $('body').on('change', '.chk-is-use', function () {
            var status = $(this).is(':checked') ? 1 : 0;
            var agentId = $('.agent.active').attr('data-id');
            var companyId = $('.company.active').attr('data-id');
            var gameId = $(this).attr('data-id');
            console.log(agentId + ":" +  gameId)
            if(agentId == undefined){
                alert('에이전트를 선택해주세요')
                $(this).prop('checked', false);
                return;
            }
            console.log(status)
            

            if(!confirm('사용상태를 변경하시겠습니까?')){$(this).prop('checked', status == 1 ? false : true);return}
            var userId = $(this).attr('data-id');
            var action = '/admin/game/status';
            
            $.ajax({
                url: action,
                data: {status, agentId, companyId, gameId},
                type: "GET",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        alert('성과적으로 변경되었습니다.');
                    }else{
                        alert('잠시후 다시 시도해주십시요.');
                    }
                },
                error: function (data) {
                }
            });
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
        $('#gamePanel').overlayScrollbars({
            // overflow: {
            //     // x: 'hidden',
            // },
        });
    </script>
@endpush