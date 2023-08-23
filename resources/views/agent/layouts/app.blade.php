<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="kr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Purple Admin</title>
        <!-- plugins:css -->
        
        <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <!-- daterange picker -->
        <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
        <!-- jquery bootstrap data table -->
        <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
        @yield('third_party_stylesheets')        
        @stack('page_css')
        <style>
          .filter-input{
            font-size:0.75rem !important; 
            padding: 5px 10px !important; 
            min-height:2rem !important;
          }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed text-xs" data-panel-auto-height-mode="height" >
<!-- ng-app="myApp" ng-controller="myController" ng-cloak -->
        {{-- <input type="hidden" name="admin_id" id="admin_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="user_password" id="user_password" value="{{Auth::user()->password}}">
        <input type="hidden" id="id_strAddress" value="ws://{{ env('EXPRESS_HOST') }}:{{ env('EXPRESS_PORT') }}">
        <input type="hidden" id="id_main" value="1"> --}}
        <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/logo.svg')}}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{Auth::user()->account}}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('agent.logout') }}">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      
        <div class="container-fluid page-body-wrapper">
            <!-- Main Sidebar Container -->
                
            @include('agent.layouts.menu')
            <!-- Content Wrapper. Contains page content -->
            <div class="main-panel">
              @yield('content')
              @include('agent.layouts.footer')
            </div>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>

        <div class="modal fade" id="modal-letter">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">쪽지보기</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-heading"></i>&nbsp;&nbsp;제목</span>
                                </div>
                                <input type="text" class="form-control" id="id_title" disabled>
                            </div>
                        </div>
                        <textarea id="summernote" style="height: 500px;" disabled>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-error" id="id_alert_error" style="display: none;"></button>
            <div class="modal fade" id="modal-error">
                <div class="modal-dialog" style="width: 400px;">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> 오류</h5>
                        <div style="height: 10px;"></div>
                        <p id="id_msg_error"></p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-info" id="id_alert_info" style="display: none;"></button>
            <div class="modal fade" id="modal-info">
                <div class="modal-dialog" style="width: 400px;">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-info"></i> 알림</h5>
                        <div style="height: 10px;"></div>
                        <p id="id_msg_info"></p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-warning" id="id_alert_warning"></button>
            <div class="modal fade show" id="modal-warning">
                <div class="modal-dialog" style="width: 400px;">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> 경고</h5>
                        <div style="height: 10px;"></div>
                        <p id="id_msg_warning"></p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-success" id="id_alert_success" style="display: none;"></button>
            <div class="modal fade" id="modal-success">
                <div class="modal-dialog" style="width: 400px;">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> 알림</h5>
                        <div style="height: 10px;"></div>
                        <p id="id_msg_success"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- plugins:js -->
        <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        {{-- <script src="{{asset('plugins/angular.min.js')}}"></script> --}}
        <script src="{{asset('plugins/moment.js')}}"></script>
        <script src="{{asset('plugins/numeral.min.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

        <script src="{{asset('assets/js/off-canvas.js')}}"></script>
        <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('assets/js/misc.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{asset('assets/js/dashboard.js')}}"></script>
        <script src="{{asset('assets/js/todolist.js')}}"></script>
        <script src="{{asset('assets/js/tabs.js')}}"></script>
        <script src="{{asset('assets/js/modal-demo.js')}}"></script>
        <!-- End custom js for this page -->
        @yield('third_party_scripts')
        @yield('script')
        @stack('page_scripts')
    </body>
</html>
