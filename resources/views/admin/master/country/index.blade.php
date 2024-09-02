@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Country</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Country</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                            <a href="{{ route('country.create') }}" class="btn btn-primary" style="margin-left: 92%">Add <i
                                    class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Checkbox</th>
                                        <th scope="col">Sr No.</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sort Order</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    <tr>
                                        <form>
                                            @csrf
                                            <th><input type='checkbox' name='check_all[]'></th>
                                            <th></th>
                                            <th><input type="text" class="form-control filter-input id" name="id">
                                            </th>
                                            <th><input type="text" class="form-control filter-input name" name="name">
                                            </th>
                                            <th><input type="text" class="form-control filter-input sort_order"
                                                    name="sort_order">
                                            </th>
                                            <th><select class="form-control filter-select select2bs4 status" name="status"
                                                    style="width: 100%;">
                                                    <option value="" selected="selected">
                                                        Status</option>
                                                    <option value="1">
                                                        Active</option>
                                                    <option value="0">Inactive</option>
                                                </select></th>
                                            <th><button type="reset" class="btn btn-default float-right">Reset</button>
                                            </th>
                                        </form>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('components.datatable_config')
    <script>
        table_id = $("#example1")
        $(function() {
            table = table_id.DataTable({
                searching: false,
                responsive: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ route('country.index') }}",
                    data: function(input) {
                        input.id = $('.id').val(),
                            input.name = $('.name').val(),
                            input.sort_order = $('.sort_order').val(),
                            input.status = $('.status').val()
                    },
                    dataType: "json",
                    type: "GET"
                },
                columns: [{
                        data: "checkbox",
                        orderable: false,
                        classname: "text-center"
                    },
                    {
                        data: "sr_no",
                        orderable: false,
                        classname: "text-center"
                    },
                    {
                        data: "id",
                        orderable: true,
                        classname: "text-center"
                    },
                    {
                        data: "name",
                        orderable: true,
                        classname: "text-center"
                    },
                    {
                        data: "sort_order",
                        orderable: true,
                        classname: "text-center"
                    },
                    {
                        data: "status",
                        orderable: true,
                        classname: "text-center"
                    },
                    {
                        data: "action",
                        orderable: false,
                        classname: "text-center"
                    }
                ],
                processing: true,
                serverSide: true,
                "order": [
                    [2, "desc"]
                ],
                language: DATATABLE_LANGUAGE,
                paging:true
                // dom:true,
                // bStateSave: true

                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            })
            // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
