@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">Gambar</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.gambar')}}">Lihat Gambar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Gambar</li>
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
                        <h3 class="mb-0">Edit Gambar</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.gambar.update', $gambar->id_gambar_des)}}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <input type="hidden" name="id_gambar_des" value="{{ $gambar->id_gambar_des }}">
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama Wisata</label>
                                <div class="col-md-10">
                                    <select class="form-select form-control select2" name="id_destinasi" id="id_destinasi">
                                        <option value="{{$gambar->id_destinasi}}">{{$gambar->destinasi->nama_des}}</option>
                                        @foreach ($destinasi as $items)
                                        <option value="{{$items->id_destinasi}}">{{$items->nama_des}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-2 col-form-label form-control-label">Gambar Wisata</label>
                                <div class="col-md-10">
                                    <input type="file" name="gambar_des" id="gambar_des" class="form-control">
                                    <small>Saran : ukuran dimensi gambar minimal 550x550</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            <a href="{{ route('admin.gambar') }}" class="btn btn-secondary mr-3 float-right">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection