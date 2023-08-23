@extends('admin.layouts.iframe')
@section('content')
<form id="userForm" method="post" action="" enctype="multipart/form-data"> 
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-size:16px; font-weight:700;">User {{ $title }}</h1>
            </div><!-- /.col -->
            <div style="position: fixed; z-index: 99; padding: 4px; right: 20px; background-color: lightgray; border-radius: 0.5rem;">
                <button type="submit" class="btn btn-primary btn-xs btnSave">Save</button>
                <button type="button" class="btn bg-indigo btn-xs btnClose">Close</button>
            </div>
            </div><!-- /.col -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">

        
        <div class="row">
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 15px;">기본정보</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" onclick="getAgentInfo()">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block; overflow-y: auto;">
                        <table class="my-table table table-bordered">
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">아이디</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strID" readonly>
                                    </div>
                                </td>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">닉네임</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strNick" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">전환배율</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control form-control-sm rounded-0" ng-model="info.fExRate" readonly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-secondary btn-flat" style="font-size: 12px; width: 50px;" disabled><i class="fas fa-times"></i></button>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">죽장요율</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control form-control-sm rounded-0" ng-model="info.fPoint" readonly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-secondary btn-flat" style="font-size: 12px; width: 50px;" disabled><i class="fas fa-percent"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">보유포인트</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" ng-model="info.nBalance" number-input readonly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-secondary btn-flat" style="font-size: 12px; width: 50px;" disabled>P</button>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">보유머니</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" ng-model="info.nMoney" number-input readonly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-secondary btn-flat" style="font-size: 12px; width: 50px;" disabled><i class="fas fa-won-sign"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">새 비번</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" id="id_new_password" oninput="this.value=this.value.replace(/[^A-Za-z0-9ㄱ-ㅎ|ㅏ-ㅣ|가-힣\s]/g,'');">
                                    </div>
                                </td>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">상태</td>
                                <td>
                                    <span class="badge bg-primary" style="padding: 5px; font-size: 11px;" ng-if="info.nStatus==0">요청</span>
                                    <span class="badge bg-info" style="padding: 5px; font-size: 11px;" ng-if="info.nStatus==1">대기</span>
                                    <span class="badge bg-success" style="padding: 5px; font-size: 11px;" ng-if="info.nStatus==2">승인</span>
                                    <span class="badge bg-danger" style="padding: 5px; font-size: 11px;" ng-if="info.nStatus==3">차단</span>
                                    <span class="badge bg-gray" style="padding: 5px; font-size: 11px;" ng-if="info.nStatus==4">삭제</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn bg-info btn-flat" style="font-size: 12px;" onclick="onChangePassword()">
                            비밀번호변경
                        </button>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 15px;">계좌정보</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" onclick="getAgentInfo()">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block; overflow-y: auto;">
                        <table class="my-table table table-bordered">
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">전화번호</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strPhone" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');">
                                    </div>
                                </td>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">예금주</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strBankUser" oninput="this.value=this.value.replace(/[^ㄱ-ㅎ|ㅏ-ㅣ|가-힣\s]/g,'');">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">은행명</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strBankName" oninput="this.value=this.value.replace(/[^A-Za-z0-9ㄱ-ㅎ|ㅏ-ㅣ|가-힣\s]/g,'');">
                                    </div>
                                </td>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">계좌번호</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strBankAcid" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn bg-pink btn-flat" style="font-size: 12px;" onclick="onChangeAcid()">
                            계좌정보변경
                        </button>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 15px;">API정보</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" onclick="getAgentInfo()">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block; overflow-y: auto;">
                        <table class="my-table table table-bordered">
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">API URL</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strApiUrl" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">API TOKEN</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strSession" readonly>
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-primary btn-flat" style="font-size: 12px; width: 60px;" onclick="onChangeToken()">재발급</button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px; padding: 10px !important; background-color: #EBF0F6">Callback URL</td>
                                <td>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm rounded-0" style="font-size: 12px;" ng-model="info.strCallBack">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-sm btn-primary btn-flat" style="font-size: 12px; width: 60px;" onclick="onChangeCallBack()">변경</button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 15px;">에이젼트목록</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" onclick="getChildList()" id="id_btnSearch">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn bg-success btn-flat" style="font-size: 12px;" onclick="onCreateInfo()">
                            에이전트생성
                        </button>
                        <div style="height: 10px;"></div>
                        <div style="display: block; height: calc(100vh - 155px); overflow-y: auto;">
                            <table id="tree-table" class="my-table table table-bordered table-striped table-head-fixed text-nowrap" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>아이디</th>
                                        <th>요율 %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="agent in lstInfo" on-finish-render="ngRepeatFinished" data-id="!%agent.nSn%!" data-parent="!%agent.nParent%!" data-level="!%agent.nStep%!">
                                        <td data-column="name">
                                            !%agent.strID%!(!%agent.strNick%!)
                                        </td>
                                        <td style="text-align: right;">
                                            <span>!%agent.fPoint%!<span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        /////////////
    </div>
</form>
@endsection
@section('script')    
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#divPrevImage').on('click', function (e) {
                $('#fileImage').trigger('click'); 
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imgPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#fileImage").change(function() {
                readURL(this);
            });
            
            //설정 보관
            // $('body').on('click', '.btnSave', function () {
            $('#userForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                
                var strID = $("#strID").val();
                if(strID == ""){
                    alert('Please input a user id!');
                    return false;
                }
                
                if($("#id").val() > 0) 
                {

                }else{
                    var txtPWD1 = $("#password").val();
                    if(txtPWD1 == ""){
                        alert('Please input a new password!');
                        
                        return false;
                    }
                    if(txtPWD1.length < 8){
                        alert('Must be at least 8 characters!');
                        return false;
                    }
                    var txtPWD2 = $("#password_confirm").val();
                    if(txtPWD1 != txtPWD2){
                        alert('Password didn\'t match!');
                        return false;
                    }
                }
                

                
                var rdoIsUsed = $("input[name='is_use']:checked").val();
                if(rdoIsUsed == undefined){
                    alert('Choose a state');
                    return false;
                }
                
                
                var userId = $("#id").val();
                var action ="/admin/user/check";
                if(userId != 0){
                    action = "/admin/user/edit/"+userId;
                    //formData.submit();
                    $.ajax({
                        url: action,
                        data: formData,
                        type: "POST",
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function ({status, data}) {
                            if(status="success"){
                                alert("Successfully updated!");
                                $('#beforeImage').val(data.image);
                                window.opener.refreshTable();
                                window.close();
                            }
                        },
                        error: function (data) {
                        }
                    });
                }else{
                    $.ajax({
                        url: action,
                        data: {strID },
                        type: "POST",
                        dataType: "json",
                        success: function({status, data}){
                            //console.log(data);
                            if(status == "success"){

                                if(data.strID == 0){
                                    alert('Successfully registered!');
                                    return;
                                }

                                action = "/admin/user/edit/"+userId;
                                //formData.submit();
                                $.ajax({
                                    url: action,
                                    data: formData,
                                    type: "POST",
                                    dataType: 'JSON',
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success: function ({status, data}) {
                                        if(status="success"){
                                            alert("Successfully registered!");
                                            // $('#beforeImage').val(data.image);
                                            window.opener.refreshTable();
                                            window.close();
                                        }
                                    },
                                    error: function (data) {
                                    }
                                });
                                
                            }
                        }
                    });
                }
                
                
            });
            
            $('.btnClose').on('click', function (e) {
                window.close();
            });
            
        });	  
    </script>
@endsection

