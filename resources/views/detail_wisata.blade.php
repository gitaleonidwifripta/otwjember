@include('frontend.header')
@include ('frontend.navbar')
<div class="form-wisata d-md-block d-none">
    <div class="card mb-3" style="max-width: auto;">
        <div class="container">
            <div class="head-link p-2 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" type="button" value="Go Back" onclick="history.back(-1)">
                        <li class="breadcrumb-item"><a href="{{ route('app') }}"><i
                                    class="fa-solid fa-arrow-left"></i>Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $destinasi[0]->nama_des }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            @if (\Session::has('Log-error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{!! \Session::get('Log-error') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif()
            @if (\Session::has('Log-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{!! \Session::get('Log-success') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif()
            <div class="row g-0">
                <div class="col-md-5 p-2">
                    <img src="{{ asset('/upload/' . $gambar_destinasi[0]->gambar_des) }}" class="card-img-left"
                        alt="...">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="owl-carousel owl-theme">
                            @foreach ($gambar_destinasi as $item)
                                <div class="card-wisata">
                                    <div class="card p-2" style="width: 6.875rem; height: 6.875rem;">
                                        <img src="{{ asset('/upload/' . $item->gambar_des) }}" class="card-img-top"
                                            alt="Pantai Papuma">
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="col-md-4 mx-auto">
                                        <div class="card-rekom ">
                                            <div class="card" style="width: 6.875rem; height: 6.875rem;">
                                                <img src="{{ 'assets/pict/sample-1.png' }}" class="card-img-top" alt="Pantai Papuma">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-4 mx-auto">
                                        <div class="card-rekom ">
                                            <div class="card" style="width: 6.875rem; height: 6.875rem;">
                                                <img src="{{ 'assets/pict/sample-1.png' }}" class="card-img-top" alt="Pantai Papuma">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-4 mx-auto">
                                        <div class="card-rekom ">
                                            <div class="card" style="width: 6.875rem; height: 6.875rem;">
                                                <img src="{{ 'assets/pict/sample-1.png' }}" class="card-img-top" alt="Pantai Papuma">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="col-md-4 mx-auto">
                                        <div class="card-rekom ">
                                            <div class="card" style="width: 6.875rem; height: 6.875rem;">
                                                <img src="{{ 'assets/pict/sample-1.png' }}" class="card-img-top" alt="Pantai Papuma">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-7 p-2">
                    <div class="card-body-detail">
                        <h2 class="card-title-wisata">{{ $destinasi[0]->nama_des }}</h2>
                        <div class="small-ratings wisata">
                            <label class="form-check-label" for="rate4">
                                <div class="small-ratings-wisata">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i><span>(4 Bintang)</span></i>
                                </div>
                            </label>
                        </div>
                        <p class="card-text-wisata location" style="font-size: 14px;"><i
                                class="fa-solid fa-location-dot"></i>
                            {{ $destinasi[0]->alamat }}
                        </p>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-4 col-md-4 border-right pr-4 info-destination text-center">
                                <p class="txt-info-tiket">Jam Buka</p>
                                <p class="txt-jam-tiket">08.00</p>
                            </div>
                            <div class="col-4 col-md-4 info-destination text-center">
                                <p class="txt-info-tiket">Jam Tutup</p>
                                <p class="txt-jam-tiket">17.00</p>
                            </div>
                            <div class="col-4 col-md-4 border-left info-destination text-center">
                                <p class="txt-info-tiket">Status</p>
                                <p
                                    class="{{ $destinasi[0]->status_des == 'Buka' ? 'badge bg-success badge-tiket' : 'badge bg-danger badge-tiket' }}">
                                    {{ $destinasi[0]->status_des == 'Buka' ? 'buka' : 'Tutup' }}
                                </p>
                            </div>
                        </div>
                        <p class=" card-text-wisata">
                        <h4><b>Deskripsi</b></h4>
                        </p>
                        <hr size="4px">
                        <p class="card-text-wisata">&emsp;&emsp;{{ $destinasi[0]->deskripsi }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info-tiket">
        <div class="bg-rev">
            <div class="container text-center">
                <div class="title-section-wisata text-white">
                    <h2 class="detail-wisata">Informasi</h2>
                    <h2><b>Harga Tiket Wisata</b></h2>
                </div>
                <div class="sub-title text-white pb-5">
                    Harga Tiket Wisata Berdasarkan Hari dan Kategori Pengunjung
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-wisata d-md-none d-block">
    <div class="container bg-white">
        <div class="head-link p-2">
            <nav aria-label="breadcrumb" class="pt-2">
                <ol class="breadcrumb" type="button" value="Go Back" onclick="history.back(-1)">
                    <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-arrow-left"></i> List
                            Wisata</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $destinasi[0]->nama_des }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme">
                    @foreach ($gambar_destinasi as $item)
                        <div class="card-wisata">
                            <div class="card p-2" style="width: 21rem; height: 21rem;">
                                <img src="{{ asset('/upload/' . $item->gambar_des) }}" class="card-img-left"
                                    alt="Pantai Papuma" style="width:336px;height:336px;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<div class="container bg-white mb-4">
    <div class="col-12 d-block d-md-none p-2">
        <div class="card-body">
            <h2 class="card-title-wisata">{{ $destinasi[0]->nama_des }}</h2>
            <p class="card-text-wisata location" style="font-size: 10px;"><i class="fa-solid fa-location-dot"></i>
                {{ $destinasi[0]->alamat }}
            </p>
            <div class="small-ratings">
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star rating-color"></i>
                <i class="fa fa-star"></i>
                <i><span>(4)</span></i>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-4 col-md-4 border-right pr-4 info-destination text-center">
                    <p class="txt-info-tiket">Jam Buka</p>
                    <p class="txt-jam-tiket">08.00</p>
                </div>
                <div class="col-4 col-md-4 info-destination text-center">
                    <p class="txt-info-tiket">Jam Tutup</p>
                    <p class="txt-jam-tiket">17.00</p>
                </div>
                <div class="col-4 col-md-4 border-left info-destination text-center">
                    <p class="txt-info-tiket">Status</p>
                    <p class="badge bg-danger badge-tiket">{{ $destinasi[0]->status_des }}</p>
                </div>
            </div>
            <p class=" card-text-wisata">
            <h6><b>Deskripsi</b></h6>
            </p>
            <hr size="4px">
            <p style="text-align:justify;" class="card-text-wisata" style="font-size: 10px;">
                &emsp;&emsp;{{ $destinasi[0]->deskripsi }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div>
<div class="info-tiket d-block d-md-none">
    <div class="bg-rev">
        <div class="container text-center">
            <div class="title-section-wisata text-white pt-4">
                <h6>Informasi</h6>
                <h2><b>Harga Tiket Wisata</b></h2>
            </div>
            <div class="sub-title text-white pb-4">
                Harga Tiket Wisata Berdasarkan Hari dan Kategori Pengunjung
            </div>
        </div>
    </div>
</div>

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 p-5">
            <div class="card card-tiket">
                <div class="card-title-tiket text-center">
                    <div class="text-day pt-2 pb-2">
                        <h2 style="font-size: 24; font-weight:bold;">Weekday</h2>
                        <h7>(Senin - Jumat)</h7>
                    </div>
                </div>
                <div class="card-body-tiket text-center">
                    <p class="card-title-tkt">Dewasa : 15.000/Orang</p>
                    <p>Anak-anak : 10.000/Orang</p>
                    <p class="card-text-tiket">Anak dibawah usia 5 tahun
                        GRATIS !!!</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-5">
            <div class="card card-tiket">
                <div class="card-title-tiket text-center">
                    <div class="text-day pt-2 pb-2">
                        <h2 style="font-size: 24; font-weight:bold;">Weekend</h2>
                        <h7>(Sabtu - Minggu)</h7>
                    </div>
                </div>
                <div class="card-body-tiket text-center">
                    <p class="card-title-tkt">Dewasa : 30.000/Orang</p>
                    <p>Anak-anak : 15.000/Orang</p>
                    <p class="card-text-tiket">Anak dibawah usia 5 tahun
                        GRATIS !!!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('pesan_wisata') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container mt-3">
        <div class="form-title text-center">
            <h2><b>Form Pemesanan Tiket</b></h2>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mt-3">
                            <input type="hidden" name="id_destinasi" value="{{ $destinasi[0]->id_destinasi }}">
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="hidden" name="id"
                                @if (Auth::check()) value="{{ Auth::user()->id }}" @endif>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="nama" placeholder="Enter nama"
                                @if (Auth::check()) name="nama" value=" {{ Auth::user()->name }}" @endif
                                readonly>
                            <label for="nama">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="nohp" placeholder="Enter nohp"
                                name="nohp"
                                @if (Auth::check()) value="{{ Auth::user()->nohp }}" @endif readonly>
                            <label for="nomor">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mt-3 mb-3">
                            @if ($jam)
                                <select type="time" class="form-control" id="jam" placeholder="Enter jam"
                                    name="jam" value="{{ $jam }}">
                                    <optgroup label="Pilih Jam">
                                        <option value="08:00">08:00 WIB</option>
                                        <option value="09:00">09:00 WIB</option>
                                        <option value="10:00">10:00 WIB</option>
                                        <option value="11:00">11:00 WIB</option>
                                        <option value="12:00">12:00 WIB</option>
                                        <option value="13:00">13:00 WIB</option>
                                        <option value="14:00">14:00 WIB</option>
                                        <option value="15:00">15:00 WIB</option>
                                        <option value="16:00">16:00 WIB</option>
                                        <option value="17:00">17:00 WIB</option>
                                    </optgroup>
                                </select>
                            @else
                                <input type="time" class="form-control" id="jam" placeholder="Enter jam"
                                    name="jam" value="{{ $jam }}">
                            @endif
                            <label for="jam">Jam</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mt-3">
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email"
                                @if (Auth::check()) value="{{ Auth::user()->email }}" @endif readonly>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="date" class="form-control" id="hari" placeholder="Enter tanggal"
                                name="hari" value="{{ $hari }}">
                            <label for="hari">Tanggal</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" min="0" max="100" class="form-control"
                                        id="dewasa" placeholder="Enter dewasa" name="dewasa" required>
                                    <label for="Dewasa">Dewasa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" min="0" max="100" class="form-control"
                                        id="anak" placeholder="Enter anak" name="anak" required>
                                    <label for="Anak-anak">Anak-anak</label>
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
    <div class="warning">
        <div class="container pt-2 pb-2" style="background-color:#FF8484;">
            <div class="title-section-wisata">
                <h3><b>PERHATIAN!</b></h3>
            </div>
            <div class="sub-title pb-5">
                Pengunjung datang ke lokasi wisata sesuai jadwal yang tertera pada tiket.
                Jika jadwal yang tertera pada tiket pengunjung adalah jam 08:00:00-10:00:00, maka tiket tidak bisa
                discan
                sebelum jam 08:00:00 dan setelah jam 10:00:00.
                Pengunjung yang terlambat datang harus memesan tiket lagi dan memilih shift selanjutnya.
            </div>
        </div>
    </div>

    <div class="container">
        <div class="sub-warning pt-5 pb-5">
            <ol>
                <li>Syarat dan ketentuan berkunjung :
                    <ul>
                        <div class="row">
                            <div class="col-md-5">
                                <li>Kondisi badan sehat dan fit saat berkunjung</li>
                                <li>Suhu tubuh kurang dari 37,3 °C </li>
                                <li>Mencuci tangan sebelum dan setelah berkunjung</li>
                                <li>Memakai masker selama berwisata</li>
                                <li>Menjaga jarak</li>
                            </div>
                            <div class="col-md-5">
                                <li>Menjaga kebersihan tempat wisata</li>
                                <li>Dilarang makan dan minum di tempat wisata</li>
                                <li>Wanita hamil dan lansia dilarang masuk</li>
                                <li>Mengikuti himbauan dan petunjuk petugas wisata</li>
                            </div>
                        </div>
                    </ul>
                </li>
                <li>Saya dan/atau rombongan telah memahami, setuju dan bertanggung jawab dengan segala resiko apabila
                    tidak
                    mematuhi syarat & ketentuan yang telah ditetapkan di atas.</li>
            </ol>
            <div class="form-check pb-4">
                <input class="form-check-input" type="checkbox" value="" id="deal" required>
                <label class="form-check-label" for="deal">
                    Saya dan/atau rombongan telah membaca, memahami, setuju dan bertanggung jawab dengan segala resiko
                    berdasarkan seluruh syarat & ketentuan yang telah ditetapkan di atas.
                </label>
            </div>
            <div class="btn-pesan">
                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
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
@include ('frontend.footer')
<script src="{{ 'assets/js/bootstrap.js' }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ 'assets/js/style.js' }}"></script>
<script src="{{ 'assets/js/owl.carousel.js' }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>
