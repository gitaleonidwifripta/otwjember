@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">Pengguna</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.peng') }}">Lihat Pengguna</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-wrapper">
                <!-- HTML5 inputs -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Tambah Pengguna Baru</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.peng.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kode Pengguna</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="id" readonly value="{{$id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama Pengguna</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Anda" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Email Pengguna</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" placeholder="Masukkan Email Anda" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">No HP Pengguna</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" placeholder="Masukkan No Hp Anda" name="nohp" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kata Sandi</label>
                                <div class="col-md-10">
                                    <input class="form-password form-control" type="password" placeholder="Masukkan Kata Sandi Anda" name="password" required>
                                    <input type="checkbox" class="form-checkbox"> Tampilkan Kata Sandi
                                </div>
                            </div>
                            <!-- Role -->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Role </label>
                                <div class="col-md-10 d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="role_1" value="mitra">
                                        <label class="form-check-label" for="role_1">
                                            Mitra
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="role" id="role_2" value="user">
                                        <label class="form-check-label" for="role_2">
                                            User
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="float: right;" type="submit">Kirim</button>
                            <a href="{{ route('admin.peng.create') }}" class="btn btn-secondary mr-3 float-right" type="reset">Atur Ulang</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
    </script>
    @endsection