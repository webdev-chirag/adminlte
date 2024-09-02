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
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item"><a href="#">Country</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="{{ route('country.store') }}">
                @csrf
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Create </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label class="form-label" for="status">Status</label>
                                    {{-- <input type="checkbox"  id="status" name="status" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"> --}}
                                    <select class="form-control select2bs4 @error('status') is-invalid @enderror"
                                        id="status" name="status" style="width: 100%;">
                                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1" selected="selected">
                                            Active</option>
                                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="sort_order">Sort Order</label>
                                    <input type="text" class="form-control @error('sort_order') is-invalid @enderror"
                                        id="sort_order" name="sort_order" value="{{ old('sort_order') }}"
                                        placeholder="Enter Sort Order">
                                    @error('sort_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create</button>
                        <button type="button" class="btn btn-default float-right">Cancel</button>
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        $(document).ready(function() {
            // $("input[data-bootstrap-switch]").each(function() {
            //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
            // })
            //Initialize Select2 Elements
            // $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endsection
