@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">Kategori</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.kate') }}">Lihat Kategori</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
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
                        <h3 class="mb-0">Tambah Kategori Baru</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.kate.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kode Kategori</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="id_kategori" readonly value="{{$id_kategori}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Jenis Kategori</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Kategori" name="kategori" required>
                                    <small>Contoh : Wisata Religi, Wisata Pantai, dll.</small>
                                </div>
                            </div>

                            <button class="btn btn-primary" style="float: right;" type="submit">Kirim</button>
                            <a href="{{ route('admin.kate.create') }}" class="btn btn-secondary mr-3 float-right" type="reset">Atur Ulang</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection