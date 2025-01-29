@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Text Editors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Text Editors</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 justfy-content-center">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit: {{ $user->name }} </h3>
                    </div>
                    @include('includes.message')
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row"> <!-- Add this row to clearly wrap your columns -->
                            <div class="card-body col-lg-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}">
                                </div>

                                <div class="mb-3 form-group">
                                    <div>
                                        <input type="radio" name="is_active" value="1" {{ $user->is_active ? 'checked' : '' }} required> Active
                                    </div>
                                    <div>
                                        <input type="radio" name="is_active" value="0" {{ !$user->is_active ? 'checked' : '' }} required> deactivate
                                    </div>
                                </div>

                            </div>

                            <!-- /.col-->
                        </div> <!-- Close your row -->

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>

</div>
@endsection

@section('footerSection')
<!-- Select2 -->
<script src=" {{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Post form specific script -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    })
</script>
@endsection