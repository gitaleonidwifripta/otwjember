@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')
@push('custom')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        .page-item.active .page-link{
            background-color: #219ebc !important;
            border-color: #8ecae6;
        }
    </style>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    order: [[1, 'desc']]
                }
            );
        })
    </script>

@endpush
<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">Transaksi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat Transaksi</li>
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
                    <h3 class="mb-0">Daftar Transaksi</h3>
                    <p class="text-sm mb-0">
                        Menampilkan seluruh transaksi online tiket wisata jember
                    </p>
                </div>
                <div class="table-responsive py-4 p-3">
                    <table class="table table-flush" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Metode Pembayaran</th>
                                <th>ID User</th>
                                <th>Jumlah Tiket</th>
                                <th>Nama Wisata</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach ($detail_transaksi as $items)
                        <tr>
                            <th>{{$items->id_detailtransaksi}}</th>
                            <th>{{$items->id_transaksi}}</th>
                            <th>{{$items->tgl_transaksi}}</th>
                            <th>{{$items->total_bayar}}</th>
                            <th>{{$items->status}}</th>
                            <th>{{$items->metode_bayar}}</th>
                            <th>{{$items->id_user}}</th>
                            <th>{{$items->jumlah_tiket}}</th>
                            <th>{{$items->nama_des}}</th>
                            <td class="table-actions">
                                <form action="{{ route('transksi.destroy',$items->id_transaksi) }}" class="p-0 m-0" method="POST" onsubmit="return confirm('Move data to trash? ')">
                                    @method('delete')
                                    @csrf
                                    <button  class="btn btn-sm font-sm btn-danger rounded"> <i class="fas fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
