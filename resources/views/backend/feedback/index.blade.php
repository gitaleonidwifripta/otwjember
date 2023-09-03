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
                    <h6 class="h2 d-inline-block mb-0">Feedback</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat Feedback</li>
                        </ol>
                    </nav>
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
                    <h3 class="mb-0">Daftar Feedback</h3>
                    <p class="text-sm mb-0">
                        Menampilkan seluruh feedback destinasi wisata jember
                    </p>
                </div>
                <div class="table-responsive py-4 p-3">
                    <table class="table table-flush" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Wisata</th>
                                <th>Nama Pengguna</th>
                                <th>Isi Feedback</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($feedback as $items)
                        <tr>
                            <th>{{$items->id_feedback}}</th>
                            <th>{{$items->id_destinasi}}</th>
                            <th>{{$items->id_user}}</th>
                            <th>{{$items->detail_feedback}}</th>
                            <th>{{$items->rating}}</th>
                            <td class="table-actions">
                                <a href="{{route('admin.feed.destroy', $items->id_feedback)}}" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete product" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                    <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection