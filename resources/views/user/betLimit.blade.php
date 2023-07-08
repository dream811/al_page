@extends('admin.layouts.app')
@section('script')
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
@endsection
@section('content')
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title" style="font-weight:bold">
        <span class="page-title-icon bg-gradient-primary text-white me-2" style="font-size:14px; ">
          <i class="mdi mdi-home"></i>
        </span> 최대 베팅금액 제한
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">최대 베팅 금액 제한</li><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          {{-- <li class="breadcrumb-item active" aria-current="page">베팅내역</li> --}}
        </ol>
      </nav>
    </div>
    
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">최대 베팅 금액 제한</h4>
            <p class="card-description"> </code>
            </p>
            <table class="table">
              <thead>
                <tr>
                  <th> 설정 분류 </th>
                  <th> 설정 대상</th>
                  <th> 최대 베팅 금액 (단위: Pot) </th>
                </tr>
              </thead>
              <tbody>
                <tr  class="bg-light">
                  <th style="width:20%">전역 설정</th>
                  <td>모든 게임 대상</td>
                  <td>
                    <div class="input-group " style="width: 500px;">
                      <input type="text" class="form-control " placeholder="전역설정" aria-label="전역설정" aria-describedby="basic-addon2">
                    </div>
                  </td>
                </tr>
                
                <tr class="bg-light">
                  <th style="width:20%">게임별설정</th>
                  
                  <td>
                    <div class="form-group mb-0" >
                      <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id" id="receiver_id">
                        <option selected value="">asdf</option>
                        <option value="ccc">ccc</option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="input-group" style="width: 500px;">
                      <input type="number" step="1" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-primary h-100" type="button">+</button>
                      </div>
                    </div>
                  </td>                  
                </tr>
                <tr>
                  <th style="width:20%">게임별설정</th>
                  <td>
                    CX - wmcasino - WM Live - 카지노
                    {{-- <div class="form-group mb-0">
                      <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id2" id="receiver_id2">
                        <option selected value="">asdf</option>
                        <option value="ccc">ccc</option>
                      </select>
                    </div> --}}
                  </td>
                  <td>
                    <div class="input-group" style="width: 500px;">
                      <input type="number" step="1" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-danger h-100" type="button">+</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th style="width:20%">게임별설정</th>
                  <td>
                    CX - wmcasino - WM Live - 카지노
                    {{-- <div class="form-group mb-0">
                      <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id3" id="receiver_id3">
                        <option selected value="">asdf</option>
                        <option value="ccc">ccc</option>
                      </select>
                    </div> --}}
                  </td>
                  <td>
                    <div class="input-group" style="width: 500px;">
                      <input type="number" step="1" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-danger h-100" type="button">+</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="bg-light">
                  <th style="width:20%">타입별 설정</th>
                  <td>
                    <div class="form-group mb-0" >
                      <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id1" id="receiver_id1">
                        <option selected value="">asdf</option>
                        <option value="ccc">ccc</option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="input-group" style="width: 500px;">
                      <input type="number" step="1" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-primary h-100" type="button">+</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr class="bg-light">
                  <th style="width:20%">벤더별 설정</th>
                  <td>
                    <div class="form-group mb-0" >
                      <select class="form-control form-control-sm select2bs4" style="width:200px;" name="receiver_id2" id="receiver_id2">
                        <option selected value="">asdf</option>
                        <option value="ccc">ccc</option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="input-group" style="width: 500px;">
                      <input type="number" step="1" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-gradient-primary h-100" type="button">+</button>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-gradient-success">저장</button>
          </div>
        </div>
      </div>
      
      
    </div>
    
  </div>
  <!-- content-wrapper ends -->
  
<!-- main-panel ends -->
@endsection
@push('page_scripts')
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
</script>
@endpush