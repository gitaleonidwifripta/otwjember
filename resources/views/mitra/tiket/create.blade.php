@extends('mitra/layouts.template')
@section('content')
@include('mitra/layouts.navbar')

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-7 col-7">
                    <h6 class="h2 d-inline-block mb-0">Tiket Wisata</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dash.des')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('mitra.tiket') }}">Lihat Tiket Wisata</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Tiket Wisata</li>
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
                        <h3 class="mb-0">Tambah Tiket Baru</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('mitra.tiket.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kode Tiket</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="id_tiket" readonly value="{{$id_tiket}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama Wisata</label>
                                <div class="col-md-10">
                                    <select class="form-select form-control select2" name="id_destinasi" id="id_destinasi">
                                        <option selected>---Pilih Wisata---</option>
                                        @foreach ($destinasi as $items)
                                        <option value="{{$items->id_destinasi}}">{{$items->nama_des}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Jenis Hari -->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Jenis Hari</label>
                                <div class="col-md-10 d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_hari" id="hari_1" value="Weekday">
                                        <label class="form-check-label" for="hari_1">
                                            Weekday
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="jenis_hari" id="hari_2" value="Weekend">
                                        <label class="form-check-label" for="hari_2">
                                            Weekend
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Tiket -->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Jenis Tiket</label>
                                <div class="col-md-10 d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_tiket" id="tiket_1" value="Dewasa">
                                        <label class="form-check-label" for="tiket_1">
                                            Dewasa
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="jenis_tiket" id="tiket_2" value="Anak-Anak">
                                        <label class="form-check-label" for="tiket_2">
                                            Anak-Anak
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Harga Tiket</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" placeholder="Masukkan Harga Tiket" name="harga_tiket" required>
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