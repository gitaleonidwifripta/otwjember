@include('frontend.header')
@include('frontend.navbar')
<div class="detailorder">
    <div class="container">
        <div class="row">
            <div class="card card-detail">
                <div class="nota2 card-body">
                    <h2 style="font-weight: 500">Form Feedback</h2>
                    <p class="h6 feedback">Isi form di bawah ini dengan sebenar-benarnya! Feedback akan dibalas
                        paling lambat 3x24 jam via email apabila mengandung keterangan yang jelas.</p>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="/action_page.php">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control feedback" id="name" placeholder="Enter nama" name="name" @if (Auth::check()) value="{{ Auth::user()->name }}" @endif>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="number" class="form-control feedback" id="nohp" placeholder="Enter nohp" name="nohp" @if (Auth::check()) value="{{ Auth::user()->nohp }}" @endif>
                                    <label for="nomor">Nomor Telepon</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control feedback" id="email" placeholder="Enter email" name="email" @if (Auth::check()) value="{{ Auth::user()->email }}" @endif>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <textarea class="form-control feedback" id="pesan" name="text" placeholder="Enter pesan"></textarea>
                                    <label for="pesan">Pesan</label>
                                </div>
                                <div class="d-md-none d-block d-grid gap-2"><button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Kirim
                                        Feedback</button>
                                </div>
                                <div class="d-md-block d-none"><button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Kirim Feedback</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-detail text-white bg-primary mb-3 mt-3">

                                <div class="nota card-body kontak">
                                    <div class="row">
                                        <div class="card-body">
                                            <h5 class="fw-bold kontak">Informasi Kontak</h5>
                                            <p class="card-text feedback" style="color: white;"><span><i class="fa-solid fa-location-dot"></i></span> Jl. Mastrip V,
                                                Sumbersari, Jember, Jawa Timur 69873</p>
                                            <p class="card-text feedback" style="color: white;"><i class="fa-solid fa-envelope"></i></i> otwjember@gmail.com
                                            </p>
                                            <p class="card-text feedback" style="color: white;"><i class="fa-solid fa-phone"></i>
                                                081234567890</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="container">
                                <div class="nota card-body text-center">
                                    <h6 style="text-align:center">Media Sosial</h6>
                                    <button type="submit" class="btn btn-link shadow-sm p-3 mb-5 bg-white rounded"><i class="fa-brands fa-youtube"></i></button>
                                    <button type="submit" class="btn btn-link shadow-sm p-3 mb-5 bg-white rounded"><i class="fa-brands fa-instagram"></i></button>
                                    <button type="submit" class="btn btn-link shadow-sm p-3 mb-5 bg-white rounded"><i class="fa-brands fa-twitter"></i></button>
                                    <button type="submit" class="btn btn-link shadow-sm p-3 mb-5 bg-white rounded"><i class="fa-brands fa-facebook"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
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