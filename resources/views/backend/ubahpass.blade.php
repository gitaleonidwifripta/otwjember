@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
    </div>

    <!-- Page content -->
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-wrapper">
                    <!-- HTML5 inputs -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Edit Password</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            @if ($message = Session::get('update'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                                <span class="alert-text"><strong>{{ $message }}</strong></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                                <span class="alert-text"><strong>{{ $message }}</strong></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <form method="POST" action="#" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Password Lama</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="oldPassword" placeholder="Password Lama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Password Baru</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="password" placeholder="Password Baru" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Konfirmasi Password Baru</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="confirmPassword" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-3 float-right">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection