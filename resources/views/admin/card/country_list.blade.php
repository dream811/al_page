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
                    <li class="breadcrumb-item"><a href="#">#</a></li>
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
                        <ul class="nav float-right">
                            <li class="pull-right float-right pr-1 pt-1" style="">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm btnAdd" >New</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body" >
                        <form id="divForm">
                            <table id="Table" class="table  table-hover table-bordered table-striped projects text-xs" cellspacing="0" width="100%">
                                
                            </table>
                        </form>
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
            scrollY: "640px",
            pageLength: 100,
            // fixedHeader: true,
            ajax: {
                url: "{{ route('admin.country.list') }}"
            },
            columns: [
                {title: "No", data: 'DT_RowIndex', name: 'DT_RowIndex', 'render' : null, orderable  : false, 'searchable' : false, width: '40px'},
                {title: "Name", data: 'name', name: 'name'},
                {title: "Action", data: 'action', name: 'action', orderable  : false , className:"text-center", width: '140px'},
            ],
            responsive: true, lengthChange: true,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#Table_wrapper .col-md-6:eq(0)');
        
        $('body').on('click', '.btnEdit', function () {
            var id = $(this).attr('data-id');
            window.open('/admin/card/country_edit/' + id, 'Country', 'scrollbars=1, resizable=1, width=600, height=420');
            return false;
        });
        $('body').on('click', '.btnAdd', function () {
            window.open('/admin/card/country_edit/' + 0, 'Country', 'scrollbars=1, resizable=1, width=600, height=420');
            return false;
        });

        $('body').on('click', '.btnDelete', function () {
            if(!confirm('You want to delete?')){return}
            var id = $(this).attr('data-id');
            var action = '/admin/card/country_edit/' + id;
            
            $.ajax({
                url: action,
                data: {status},
                type: "DELETE",
                dataType: 'json',
                success: function ({status, data}) {
                    if(status == "success"){
                        refreshTable();
                        alert('Successfully deleted.');
                    }else{
                        alert('Failed to delete.');
                    }
                },
                error: function (data) {
                }
            });
        });
        function refreshTable() {
            $('#Table').DataTable().ajax.reload();
        }
        
    </script>
@endpush