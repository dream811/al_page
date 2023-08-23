@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h4 class="page-title"> 유저수정 </h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">유저</a></li>
            <li class="breadcrumb-item active" aria-current="page">유저수정</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <form class="forms-sample">
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">번호</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputEmail2" class="col-sm-3 col-form-label">아이디</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputMobile" class="col-sm-3 col-form-label">가입시각</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">현재 보유금액</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agent" class="col-sm-3 col-form-label">소속 에이전트</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="agent" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nickname" class="col-sm-3 col-form-label">닉네임</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nickname" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">최근 접속시각</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">최근 접속시각</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" placeholder="">
                  </div>
                </div>
                {{-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                </div> --}}
                <div class="form-group row ml-1">
                  <div class="form-check col-3">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value=""> 활성화(정상) <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check col-3">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" checked=""> 비활성화(차단) <i class="input-helper"></i></label>
                  </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary mr-2">저장</button>
                {{-- <button class="btn btn-light">취소</button> --}}
              </form>
            </div>
          </div>
        </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
      </div>
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
        
        
    </script>
@endpush