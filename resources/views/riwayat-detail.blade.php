@include('frontend.header')
@include('frontend.navbar')
@vite('resources/js/app.js')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" /> --}}
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
<style>
    .bg-primary{
        background-color: #8ecae6 !important;
    }
</style>
@php
    // $detail = \App\Models\Jurnal
@endphp
<div class="container my-5">
    <div class="card-body bg-primary rounded p-4">
        <div class="mb-3 py-5">
            <img  src="{{ asset('assets/pict/logo-otw.png') }}" class="w-25" alt="Icon OTW">
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-responsive-sm" style="border: #8ecae6">
                    <tbody>
                        <tr class="p-4">
                            <th width="30%">Nomor Invoice</th>
                            <td width="1%">:</td>
                            <td >{{ $data->id_transaksi }}</td>
                        </tr>
                        <tr class="p-4">
                            <th width="20%">Nomor Pesenan</th>
                            <td width="1%">:</td>
                            <td >{{ $data->id_transaksi }}</td>
                        </tr>
                        <tr class="p-4">
                            <th width="20%">Wisata</th>
                            <td width="1%">:</td>
                            <td >{{ count($detail) > 0 ? $detail[0]->nama_des : '-' }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-responsive-sm" style="border: #8ecae6">
                    <tbody>
                        <tr class="p-4">
                            <th width="30%">Status</th>
                            <td width="1%">:</td>
                            <td >
                                @if ($data->status == 'sukses')
                                    <i class="fa-regular fa-circle-check"></i><span class="ms-1" style="color: green;">Paid</span> <br>
                                @else
                                    <i class="fa fa-times" aria-hidden="true"></i><span class="ms-1" style="color: red;">{{ $data->status }}
                                @endif
                            </td>
                        </tr>
                        <tr class="p-4">
                            <th width="20%">Tgl Nota</th>
                            <td width="1%">:</td>
                            <td >{{ \Carbon\Carbon::parse($data->tgl_transaksi)->translatedFormat('d M Y') }}</td>
                        </tr>
                        <tr class="p-4">
                            <th width="20%">Tgl Pesanan</th>
                            <td width="1%">:</td>
                            <td >{{ \Carbon\Carbon::parse($data->tgl_transaksi)->translatedFormat('d M Y') }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="card-body bg-white">
        <div class="row p-5">
            <div class="col-md-6">
                <h4 class="fw-bold">Lokasi Wisata</h4>
                <h6 class="fw-bold">{{ count($detail) > 0 ? $detail[0]->nama_des : '-'}}</h6>
                <p>
                    {{ count($detail) > 0 ? $detail[0]->alamat : '-' }}
                </p>
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold">Customer</h4>
                <h6 class="fw-bold">{{ $data->user->name }}</h6>
                <a href="#">{{ $data->user->email }}</a>
            </div>
        </div>
        <table class="table table-bondered">
            <thead>
                <tr>
                    <th class="fw-bold">Qty</th>
                    <th class="fw-bold">Kategori</th>
                    <th class="fw-bold">Satuan</th>
                    <th class="fw-bold">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($detail as $item)
                    <tr>
                        <td>{{ $item->jumlah_tiket }}</td>
                        <td>{{ $item->jenis_tiket }}</td>
                        <td>Rp.{{ number_format($item->harga_tiket, 2, ',', '.') }}</td>
                        <td>Rp.{{ number_format($item->harga_tiket, 2, ',', '.') }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
            <tfoot class="table-bondered" style="border-bottom: 1px solid #000">
                <tr>
                  <th colspan="3" class="text-end" align="end">Total</th>
                  <td>Rp.{{ number_format($data->total_bayar, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        <section class="balance-info">
            <div class="row">
                <div class="ttd col-md-6 text-center">
                    <p class="invoice fw-bold">Management OTW Jember </p>
                    <p></P>
                    <img src="{{ asset('assets/pict/logo-otw.png') }}" class="img-fluid w-25" alt="">
                    <p></P>
                    <p class="invoice"> Director Signature </p>
                    <p class="mt-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    </p>
                </div>

                <div class="kondisi col-md-6 text-center">
                    <p class="invoice">Silahkan Scan QR Code dibawah untuk melakukan pembayaran</p>
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0" class="img-responsive" />
                </div>
            </div>
        </section>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 fw-bold text-center">
                Unduh <a href="" class="text-primary">Disini</a>
            </div>
            <div class="col-md-6 fw-bold text-center" >
                Kembali ke <a href="{{ route('riwayat.pesanan') }}" class="text-primary">Beranda</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
