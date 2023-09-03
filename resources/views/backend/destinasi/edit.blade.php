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
                            <li class="breadcrumb-item"><a href="{{route('admin.des')}}">Lihat Destinasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Destinasi</li>
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
                        <h3 class="mb-0">Edit Destinasi</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.des.update', $destinasi->id_destinasi)}}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <input type="hidden" name="id_destinasi" value="{{ $destinasi->id_destinasi }}">
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Nama Wisata</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="nama_des" value="{{ $destinasi->nama_des }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Alamat Wisata</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="alamat" rows="3">{{ $destinasi->alamat }}</textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Status</label>
                                <div class="col-md-10 d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status_des" id="status_1" value="Buka" {{$destinasi->status_des == 'Buka' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_1">
                                            Buka
                                        </label>
                                    </div>
                                    <div class="form-check ml-4">
                                        <input class="form-check-input" type="radio" name="status_des" id="status_2" value="Tutup" {{$destinasi->status_des == 'Tutup' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_2">
                                            Tutup
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Deskripsi Wisata</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="deskripsi" rows="3">{{ $destinasi->deskripsi}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Kategori Wisata</label>
                                <div class="col-md-10">
                                    <select class="form-select form-control select2" name="id_kategori" id="id_kategori">
                                        <option value="{{$destinasi->id_kategori}}">{{$destinasi->kategori->kategori}}</option>
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
                                        <option value="{{$destinasi->id}}">{{$destinasi->user->name}}</option>
                                        @foreach ($user as $items)
                                        @if ($items->role == 'mitra')
                                        <option value="{{$items->id}}">{{$items->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            <a href="{{ route('admin.des') }}" class="btn btn-secondary mr-3 float-right">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection