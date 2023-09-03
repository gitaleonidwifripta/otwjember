@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">Destinasi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.des') }}">Lihat Destinasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Destinasi</li>
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
                        <h3 class="mb-0">Tambah Destinasi Baru</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.des.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kode Wisata</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="id_destinasi" readonly value="{{$id_destinasi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama Wisata</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Wisata" name="nama_des" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Alamat Wisata</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat Wisata" required></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Status </label>
                                <div class="col-md-10 d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_des" id="status_1" value="Buka">
                                        <label class="form-check-label" for="status_1">
                                            Buka
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="status_des" id="status_2" value="Tutup">
                                        <label class="form-check-label" for="status_2">
                                            Tutup
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Deskripsi Wisata</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Wisata" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kategori Wisata</label>
                                <div class="col-md-10">
                                    <select class="form-select form-control select2" name="id_kategori" id="id_kategori">
                                        <option selected>---Pilih Kategori---</option>
                                        @foreach ($kategori as $items)
                                        <option value="{{$items->id_kategori}}">{{$items->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Pengelola Wisata</label>
                                <div class="col-md-10">
                                    <select class="form-select form-control select3" name="id" id="id">
                                        <option selected>---Pilih Pengelola---</option>

                                        @foreach ($user as $items)
                                        @if ($items->role == 'mitra')
                                        <option value="{{$items->id}}">{{$items->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-primary" style="float: right;" type="submit">Kirim</button>
                            <a href="#" class="btn btn-secondary mr-3 float-right" type="reset">Atur Ulang</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection