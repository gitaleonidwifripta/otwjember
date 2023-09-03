@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')
<script type="text/javascript">
    $.noConflict();
    jQuery(document).ready(function($) {
        $('#myTable').DataTable();
    });
</script>
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
                            <li class="breadcrumb-item active" aria-current="page">Lihat Destinasi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('admin.des.create')}}" class="btn btn-sm btn-primary">Tambah Destinasi Baru</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                        <span class="alert-text"><strong>{{ $message }}</strong></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

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
                    <h3 class="mb-0">Daftar Destinasi</h3>
                    <p class="text-sm mb-0">
                        Menampilkan seluruh data destinasi wisata jember
                    </p>
                </div>
                <div class="table-responsive py-4 p-3">
                    <table class="table table-flush" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Destinasi</th>
                                <th>Status</th>
                                <th>Deskripsi</th>
                                <th>Alamat</th>
                                <th>Kategori</th>
                                <th>Pengelola</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($destinasi as $items)
                        <tr>
                            <th>{{$items->id_destinasi}}</th>
                            <th>{{$items->nama_des}}</th>
                            <th>{{$items->status_des}}</th>
                            <th>{{$items->deskripsi}}</th>
                            <th>{{$items->alamat}}</th>
                            <th>{{$items->kategori->kategori}}</th>
                            <th>{{$items->user->name}}</th>
                            <td class="table-actions">
                                <a href="{{route('admin.des.edit', $items->id_destinasi)}}" class="table-action" data-toggle="tooltip" data-original-title="Edit product">
                                    <button type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></button>
                                </a>
                                <a href="{{route('admin.des.destroy', $items->id_destinasi)}}" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </a>
                                <!-- <a type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-info-circle"></i></a> -->
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog-table-responsive py-4 p-3">
            <div class="modal-content">
                <div class="modal-header float-right">
                    <h5>Detail Destinasi</h5>
                    <div class="text-right">
                        <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                    </div>
                </div>
                <div class="modal-body">

                    <div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Destinasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Pengelola</th>
                                </tr>
                            </thead>
                            @foreach ($destinasi as $items)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$items->id_destinasi}}</th>
                                    <td>Samso</td>
                                    <td>Natto</td>
                                    <td>@samso</td>
                                    <td>@samso</td>
                                    <td>@samso</td>
                                    <td>@samso</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div> -->
    @endsection