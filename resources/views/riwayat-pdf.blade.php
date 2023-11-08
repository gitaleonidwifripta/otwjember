@vite('resources/js/app.js')
@include('frontend.header')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<style>

    @media print {
        @page {
            size: A3 landscape;
            padding: 10px
                /* margin-bottom: 2cm; */
        }

        table {
            width: 100%;
        }
        * {
            -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
            color-adjust: exact !important;                 /*Firefox*/     /*Firefox*/
        }
        html,
        body {
            width: 100%;
            height: max-content;
        }

        .card{
            padding: 0;
        }
        .card-body{
            padding: 0 10px 0 10px;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
    /* ... the rest of the rules ... */
    }
</style>
<div class="card my-5">
    <div class="p-5 my-5">
        <div class="row">
            <div class="col-10 col-md-8">
                <h2 class="riwayat-title">Detail Pemesanan</h2>
                <h6 class="riwayat-sub-title">Review and Manage Detail Order</h6>
            </div>
            <div class="col-2 col-md-4 p-0 download-sub d-flex align-items-center justify-content-right">
                <button onclick="history.back()" class="btn btn-primary no-print">Kembali</button>

            </div>
        </div>
    </div>
    <div class="table-riwayat p-5   ">
        <div class=" riwayat">
            <table class="table table-responsive table-borderless bg-white table-hover">
                <thead>
                    <tr class="bg-light riwayat">
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="5%">Invoice</th>
                        <th scope="col" style="text-align: center" width="20%">Tanggal Pemesanan</th>
                        <th scope="col" width="10%">Status</th>
                        <th scope="col" style="text-align: center" width="20%">Customer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->id_transaksi }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tgl_transaksi)->translatedFormat('d M Y') }}</td>
                            <td>
                                @if ($item->status == 'sukses')
                                    <i class="fa-regular fa-circle-check"></i><span class="ms-1" style="color: green;">Paid</span> <br>
                                @else
                                    <i class="fa fa-times" aria-hidden="true"></i><span class="ms-1" style="color: red;">{{ $item->status }}
                                @endif
                            </span>
                            </td>
                            <td>
                                <div class="row">
                                    @if ($item->detail_user != null)
                                        <div class="col-lg-4 d-none d-lg-block "><img src="{{$item->detail_user != null ?  asset('upload/fotoprofil/'.$item->detail_user->foto_profil) : asset('assets/pict/logo-cust.png') }}"
                                                class="icon-table">
                                        </div>
                                    @else
                                        <div class="col-lg-4 d-none d-lg-block "><img src="{{ asset('assets/pict/logo-cust.png') }}"
                                                class="icon-table">
                                        </div>

                                    @endif
                                    <div class="col-12 col-lg-8" style="padding-left: 0px">
                                        <h6 class="font-riwayat">{{ $item->user->name }}</h6>
                                        <h6 class="font-sub-riwayat">{{ $item->user->email }}</h6>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>

</div>
<script>
     window.onload = function() {
        window.print();


    }
</script>
