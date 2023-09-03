@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
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
                            <h3 class="mb-0">Edit Profile</h3>
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
                            <form method="POST" action="{{ route('admin.updateProfile') }}" enctype="multipart/form-data">
                                @csrf
                                @foreach($users as $user)
                                <div>
                                    <input type="hidden" name="id" value="{{ $user->User->id}}">
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Username</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ $user->User->name}}" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-md-2 col-form-label form-control-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ $user->User->email}}" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-md-2 col-form-label form-control-label">No HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ $user->User->nohp}}" name="nohp">
                                    </div>
                                </div>
                                @if (isset($user->jenis_klm))
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Jenis Kelamin</label>
                                    <div class="col-md-10 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_klm" id="jk_1" value="Laki-Laki" {{$user->jenis_klm == 'Laki-Laki' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="jk_1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="jenis_klm" id="jk_2" value="Perempuan" {{$user->jenis_klm == 'Perempuan' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="jk_2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Jenis Kelamin </label>
                                    <div class="col-md-10 d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_klm" id="jk_1" value="Laki-Laki">
                                            <label class="form-check-label" for="jk_1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check ml-4">
                                            <input class="form-check-input" type="radio" name="jenis_klm" id="jk_2" value="Perempuan">
                                            <label class="form-check-label" for="jk_2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if (isset($user->alamat_user))
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Alamat</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="alamat_user" rows="3">{{ $user->alamat_user}}</textarea>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Alamat</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="alamat_user" rows="3" placeholder="Masukkan Alamat Anda" required></textarea>
                                    </div>
                                </div>
                                @endif
                                @if (isset($user->foto_profil))
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-md-2 col-form-label form-control-label">Foto Profil</label>
                                    <div class="col-md-10">
                                        <input type="file" name="foto_profil" id="foto_profil" class="form-control">
                                        <small>Saran : ukuran dimensi gambar minimal 550x550</small>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-md-2 col-form-label form-control-label">Foto Profil</label>
                                    <div class="col-md-10">
                                        <input type="file" name="foto_profil" id="foto_profil" class="form-control" required>
                                        <small>Saran : ukuran dimensi gambar minimal 550x550</small>
                                    </div>
                                </div>
                                @endif
                                @endforeach
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