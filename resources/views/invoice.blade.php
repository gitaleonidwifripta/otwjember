{{--    @include('frontend.navbar') --}}
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ 'assets/css/style_2.css' }}">

    <title>Invoice</title>
</head>

<body>
</body>

</html>
<p></p>
<div class="container">
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="#" class="fa-solid fa-arrow-left"></a></li>&nbsp;
            <!-- <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-arrow-left"></i> </a></li> -->
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">List Wisata</a></li>
            <li class="breadcrumb-item"><a href="#">Pantai Papuma</a></li>
            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
    </nav> --}}
</div>

<div class="my-5 page" size="A4">
    <div class="invoice">
        <section class="top-content bb d-flex justify-content-between">
            <div class="logo">
                <img src="{{ 'assets/img/logo.png' }}" alt="" class="otw">
            </div>
            <!-- <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span>XXXX</span></p>
                    </div>
                </div> -->
        </section>

        <section class="store-user mt-4">
            <div class="col-12">
                <div class="row bb pb-3">
                    <div class="col-6 col-md-6 col-lg-7">
                        <p class="invoice">Nomor Transaksi: <span>{{ $detail[0]->id_transaksi }}</span></p>
                        <p class="invoice">Wisata: <span>{{ $detail[0]->nama_des }}</span></p>
                    </div>
                    <div class="col-6 col-md-6 col-lg-5">
                        <p class="invoice">Status: <span style="color: red;">{{ $detail[0]->status }}</span></p>
                    <p class="invoice">Tanggal Nota: <span></span></p>
                        <p class="invoice">Tanggal Pesanan: <span>{{ $detail[0]->tgl_transaksi }}</span></p>
                    </div>
                </div>
                <div class="row extra-info pt-3">
                    <div class="col-6 col-md-6 col-lg-7">
                        <h5 class="invoice">Lokasi Wisata</h5>
                        <p class="invoice">{{ $detail[0]->nama_des }}</p>
                        <p class="address">{{ $detail[0]->alamat }}</p>
                    </div>
                    <div class="col-6 col-md-6 col-lg-5">
                        <h5 class="invoice">Customer</h5>
                        <p class="invoice">@if(Auth::check()){{ Auth::user()->name }}@endif</p>
                        <p class="address"> @if(Auth::check()){{ Auth::user()->email }}@endif<br>@if(Auth::check()){{ Auth::user()->nohp }}@endif</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-area mt-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="invoice">Tiket</td>
                        <td class="invoice">Harga</td>
                        <td class="invoice">Jumlah</td>
                        <td class="invoice">Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                        <tr>
                        <td class="invoice">{{ $item->jenis_tiket }}</td>
                        <td class="invoice">{{ $item->harga_tiket }}</td>
                        <td class="invoice">{{ $item->jumlah_tiket }}</td>
                        <td class="invoice">{{ $item->jumlah_tiket*$item->harga_tiket }}</td>
                    </tr>
                    @endforeach
                    
                    
                    <tr>
                        <td class="invoice"></td>
                        <td class="invoice"></td>
                        <td class="invoice fw-bold">Total</td>
                        <td class="invoice fw-bold">{{ $detail[0]->total_bayar }}</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="balance-info">
            <div class="row">
                <div class="ttd col-4 text-center">
                    <p class="invoice fw-bold">Management OTW Jember </p>
                    <p></P>
                    <img src="{{ 'assets/img/signature.png' }}" class="img-fluid" alt="">
                    <p></P>
                    <p class="invoice"> Director Signature </p>
                </div>
                <div class="col-2">
                </div>
                <div class="kondisi col-6 text-center">
                    <p class="invoice">Silahkan Scan QR Code dibawah untuk melakukan pembayaran</p>
                    <img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0" class="img-responsive" />
                </div>
            </div>
    </div>
    </section>

    <footer>
        <hr>
        <p class="m-0 text-center "></p>
        <div class="social pt-3 text-center">
            <span class="invoice pr-2">
                <i class="fas fa-mobile-alt"></i>
                <span class="invoice">081234567890</span>
            </span>
            <span class="invoice pr-2">
                <i class="fas fa-envelope"></i>
                <span class="invoice">otwjember@gmail.com</span>
            </span>
            <span class="invoice pr-2">
                <i class="fab fa-facebook-f"></i>
                <span class="invoice">Otw Jember</span>
            </span>
            <span class="invoice pr-2">
                <i class="fab fa-youtube"></i>
                <span class="invoice">Otw Jember</span>
            </span>
            <span class="invoice pr-2">
                <i class="fab fa-instagram"></i>
                <span class="invoice">otwjember</span>
            </span>
        </div>
    </footer>
</div>
</div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div>
                        <p>Unduh <a href="http://127.0.0.1:8000/invoice" onclick="window.open(this.href).print(); return false" class="link-info">Disini</a>
                        </p>
                    </div>
                    <div>
                        <p>Kembali ke <a href="#" class="link-info">Beranda</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ 'assets/js/bootstrap.js' }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ 'assets/js/style.js' }}"></script>