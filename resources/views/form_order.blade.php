@include('frontend.header')
@include ('frontend.navbar')
<div class="detailorder">
    <div class="container">
        <div class="head-link p-2 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb form-order">
                    <li><a href="#" class="fa-solid fa-arrow-left"></a></li>&nbsp;
                    <!-- <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-arrow-left"></i> </a></li> -->
                    <li class="breadcrumb-item"><a href="{{ route('app') }} ">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Wisata</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Order</li>
                </ol>
            </nav>
        </div>
        <form action="{{ route('update_bayar', $id_transaksi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="formdetail mt-3">
                        <div class="card card-detail">
                            <div class="formdetail card-body p-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="detail">Masukan Data</h4>
                                        <div class="form mt-3">
                                            <input type="hidden" name="id" @if (Auth::check()) value="{{ Auth::user()->id }}" @endif>
                                            <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama" @if (Auth::check()) value=" {{ Auth::user()->name }}" @endif readonly>
                                            <div class="form mt-3">
                                                <input type="text" class="form-control" id="nohp" placeholder="Enter nohp" name="nohp" @if (Auth::check()) value=" {{ Auth::user()->nohp }}" @endif readonly>
                                            </div>
                                        </div>
                                        <div class="form mt-3">
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" @if (Auth::check()) value=" {{ Auth::user()->email }}" @endif readonly>
                                        </div>
                                        <div class="form mt-3">
                                            <input type="date" class="form-control" id="hari" placeholder="Enter tanggal" name="hari" value="{{ $_REQUEST['hari'] }}" readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form mt-3">
                                                    <input type="number" class="form-control" id="dewasa" placeholder="Enter dewasa" name="dewasa" value="{{ $_REQUEST['dewasa'] }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form mt-3">
                                                    <input type="number" class="form-control" id="anak" placeholder="Enter anak" name="anak" value="{{ $_REQUEST['anak'] }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-radio">
                                            <div class="metode pt-2">
                                                <h4 class="detail-metode">Pilih Metode Pembayaran</h4>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="metode_bayar" id="qris" value="qris" required>
                                                <img src="{{ 'assets/img/Qris.png' }}" alt="QRIS" style="width:58px;height:21px;">
                                                <label class="subbank-text form-check-label" for="qris">
                                                    Barcode
                                                </label>
                                            </div>
                                            <div class="bank pt-2">
                                                <p class="bank-text">Transfer Bank</p>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="metode_bayar" id="bca" value="bca" required>
                                                <img src="{{ 'assets/img/bca.png' }}" alt="BCA" class="img-bank">
                                                <label class="subbank-text form-check-label" for="bca">
                                                    Bank BCA
                                                </label>
                                            </div>
                                            <div class="bank form-check">
                                                <input class="bank form-check-input" type="radio" name="metode_bayar" id="bri" value="bri" required>
                                                <img src="{{ 'assets/img/bri.png' }}" alt="BRI" class="img-bank">
                                                <label class="subbank-text form-check-label" for="bri">
                                                    Bank BRI
                                                </label>
                                            </div>
                                            <div class="bank form-check">
                                                <input class="bank form-check-input" type="radio" name="metode_bayar" id="bni" value="bni" required>
                                                <img src="{{ 'assets/img/bni.png' }}" alt="BNI" class="img-bank">
                                                <label class="subbank-text form-check-label" for="bni">
                                                    Bank BNI
                                                </label>
                                            </div>
                                            <div class="bank form-check">
                                                <input class="bank form-check-input" type="radio" name="metode_bayar" id="mandiri" value="mandiri" required>
                                                <img src="{{ 'assets/img/mandiri.png' }}" alt="mandiri" class="img-bank">
                                                <label class="subbank-text form-check-label" for="mandiri">
                                                    Bank MANDIRI
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-12">
                <div class="total pt-3">
                    <div class="total">
                        <div class="card total">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <p class="info-text"> Tgl Nota :</p>
                                        <p class="date-text">{{ $tglnota }}</p>
                                    </div>
                                    <div class="col-md-6 col-6 footer-right">
                                        <p class="info-text"> Tgl Pesan :</p>
                                        <p class="date-text">{{ $_REQUEST['hari'] }}</p>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <p class="subdetail">Pesanan Kamu</p>
                                        <p class="subdetail-text">Tiket Dewasa</p>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <p class="harga-text">{{ $_REQUEST['dewasa'] }} x {{ $hargatiketdws }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-6 harga-right">
                                        <p class="total">{{ $totaltiketdewasa }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="subdetail-text">Tiket Anak-anak</p>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <p class="harga-text">{{ $_REQUEST['anak'] }} x {{ $hargatiketanak }}</p>
                                    </div>
                                    <div class="col-md-6 col-6 harga-right">
                                        <p class="total">{{ $totaltiketanak }}</p>
                                    </div>
                                    <hr>
                                    <div class="col-md-6 col-6">
                                        <p class="total" style="color: black">Total Pembayaran</p>
                                    </div>
                                    <div class="col-md-6 col-6 harga-right">
                                        <input type="hidden" name="totalbayar" value="{{ $totalbayar }}">
                                        <p class="total" name="totalbayar">{{ $totalbayar }}</p>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary mb-3" type="button">Pesan
                                            Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</form>
</div>
</div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika kamu yakin untuk meninggalkan halaman ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    {{ __('Keluar') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ 'assets/js/bootstrap.js' }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ 'assets/js/style.js' }}"></script>