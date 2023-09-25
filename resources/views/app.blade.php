@include('frontend.header')
@include('frontend.navbar')
@vite('resources/js/app.js')
<div class="header">
    <div id="img-header">
        <img src="{{ 'assets/pict/header1.jpeg' }}" class="w-100" alt="...">
    </div>
    <div class="welcoming-text text-center text-white">
        <h1 class="welcoming">Selamat Datang di</h1>
        <h1 class="sub-welcom" style="font-family:'Xiomara'">OTW Jember</h1>
    </div>
    <div class="form-booking">
        <div class="container">
            @if (\Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{!! \Session::get('error') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif()

            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form action="{{ route('cari_wisata') }}" method="GET" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></i></span>
                            <select class="form-control" name="destinasi" id="destinasi">
                                <optgroup label="Pilih Tempat Wisata">
                                    @foreach ($destinasi as $items)
                                        <option value="{{ $items->id_destinasi }}">{{ $items->nama_des }}</option>
                                    @endforeach
                                </optgroup>
                            </select>

                            <span class="input-group-text"><i class="fa-solid fa-calendar-check"></i></span>
                            <input class="form-control" type="date" name="hari" id="hari">

                            </select>
                            <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                            <select type="time" class="form-control" name="jam" id="jam">
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
                            <button type="submit" class="btn btn-primary btn-pilih">Pilih</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-booking">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cari_wisata') }}" method="GET" enctype="multipart/form-data">
                        <div class="input-group">
                            <span class="input-group-text  mobile-book"><i class="fa-solid fa-calendar-days"></i></span>
                            <select class="mb-1 form-control input-book" name="destinasi" id="destinasi">
                                <optgroup label="Pilih Tempat Wisata">
                                    @foreach ($destinasi as $items)
                                        <option value="{{ $items->id_destinasi }}">{{ $items->nama_des }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text  mobile-book"><i
                                    class="fa-solid fa-calendar-check"></i></span>
                            <input class="mb-1 form-control input-book" type="date" name="hari" id="hari">
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text  mobile-book"><i class="fa-solid fa-clock"></i></span>
                            <select type="time" class="mb-1 form-control input-book" name="jam" id="jam">
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
                        </div>

                        <div class="d-flex justify-content-center pt-1">
                            <button type="submit" class="btn btn-primary btn-pilih">Proses Pesanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rekomen">

    <div class="container">
        <div class="title-section">
            <h2 class="txt-section">Rekomendasi Destinasi Wisata</h2>
        </div>
        <div class="sub-title">
            <p class="txt-subtitle">Destinasi Populer ini punya banyak hal yang menarik</p>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <form action="{{ route('cari_wisata') }}" method="GET" enctype="multipart/form-data">
                        @foreach ($destinasi as $items)
                            <div class="carousel-item active">
                                <div class="col-md-4 col-sm-12 col-lg-3">
                                    <div class="card-rekom p-1">
                                        <div class="card" style="width: inherit;">
                                            @if ($items->gambar_des)
                                                <img src="{{ asset('/upload/' . $items->gambar_des) }}"
                                                    class="card-img-top" alt="...">
                                            @else
                                                <img src="assets/pict/sample-1.png " class="card-img-top"
                                                    alt="...">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $items->nama_des }}</h5>
                                                <div class="small-ratings">
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i><span>(3)</span></i>
                                                </div>
                                                <p class="card-text location"><i class="fa-solid fa-location-dot"></i>
                                                    {{ $items->alamat }}
                                                </p>
                                                <hr>
                                                <div class="row g-1 d-flex justify-content-center align-items-center">
                                                    <div
                                                        class="col-4 col-md-4 border-right pr-4 info-destination text-center">
                                                        <p class="txt-info">Jam Buka</p>
                                                        <p class="txt-jam">08.00</p>
                                                    </div>
                                                    <div class="col-4 col-md-4 info-destination text-center">
                                                        <p class="txt-info">Jam Tutup</p>
                                                        <p class="txt-jam">17.00</p>
                                                    </div>
                                                    <div
                                                        class="col-4 col-md-4 border-left info-destination text-center">
                                                        <p class="txt-info">Status</p>
                                                        <p
                                                            class="{{ $items->status_des == 'Buka' ? 'badge bg-success badge-rekom' : 'badge bg-danger badge-rekom' }}">
                                                            {{ $items->status_des == 'Buka' ? 'buka' : 'Tutup' }}</p>
                                                    </div>
                                                </div>
                                                <div class="row g-1 pt-3 d-flex justify-content-evenly">
                                                    <div class="col-7 col-md-7 col-xl-7 harga-tiket">
                                                        <p class="txt-info text-left">Harga Tiket</p>
                                                        <p class="txt-harga">Rp7.000 s/d Rp15.000</p>
                                                    </div>
                                                    <div class="col-4 col-md-4 col-xl-4">
                                                        <a class="btn btn-primary pesan"
                                                            href="{{ route('cari_wisata', ['destinasi' => $items->id_destinasi]) }}">Pesan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>
                    <!-- <div class="carousel-item">
                        <div class="col-md-4 col-sm-12 col-lg-3">
                            <div class="card-rekom p-1">
                                <div class="card" style="width: inherit;">
                                    <img src="{{ 'assets/pict/sample-1.png' }}" class="card-img-top" alt="Pantai Papuma">
                                    <div class="card-body">
                                        <h5 class="card-title">Pantai Papuma</h5>
                                        <div class="small-ratings">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i><span>(3)</span></i>
                                        </div>
                                        <p class="card-text location"><i class="fa-solid fa-location-dot"></i>
                                            Jl. Raya
                                            Lojejer,
                                            Area Kebun, Lojejer, Wuluhan, Kabupaten Jember, Jawa Timur 68162</p>
                                        <hr>
                                        <div class="row g-1 d-flex justify-content-center align-items-center">
                                            <div class="col-4 col-md-4 border-right pr-4 info-destination text-center">
                                                <p class="txt-info">Jam Buka</p>
                                                <p class="txt-jam">08.00</p>
                                            </div>
                                            <div class="col-4 col-md-4 info-destination text-center">
                                                <p class="txt-info">Jam Tutup</p>
                                                <p class="txt-jam">17.00</p>
                                            </div>
                                            <div class="col-4 col-md-4 border-left info-destination text-center">
                                                <p class="txt-info">Status</p>
                                                <p class="badge bg-danger">Tutup</p>
                                            </div>
                                        </div>
                                        <div class="row g-1 pt-3 d-flex justify-content-evenly">
                                            <div class="col-7 col-md-7 harga-tiket">
                                                <p class="txt-info">Harga Tiket</p>
                                                <p class="txt-harga">Rp7.000 s/d Rp15.000</p>
                                            </div>
                                            <div class="col-4 col-md-4 justify-content-evenly">
                                                <button class="btn btn-primary pesan">Pesan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="review">
    <div class="bg-rev circle-bg">
        <div class="container pt-0 pb-5">
            <div class="title-section text-white">
                <h2>Apa Kata Mereka</h2>
            </div>
            <div class="sub-title text-white pb-3 pt-3" style="font-size:12px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sapien vehicula interdum odio et et. Hac
                lacus pulvinar donec pulvinar tellus rhoncus adipiscing sed.
            </div>
            <div class="owl-carousel owl-theme d-block d-lg-none">
                <div class="col-12 col-md-6 col-lg-4 pt-5 review">
                    <div class="container">
                        <div class="col">
                            <div class="card card-review">
                                <div class="card-profile">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden img-card">
                                        <img src="https://i.stack.imgur.com/fcbpv.jpg?s=256&g=1"
                                            class="card-img-top img-cover" alt="Raeesh">
                                    </div>
                                </div>
                                <div class="card-body-review">'
                                    <div class="g-1 d-flex">
                                        <div class="col-7 col-md-7 col-xl-7 name-review">
                                            <h5 class="card-title-review text-left">Nuzul Ridhoi</h5>
                                        </div>
                                        <div class="small-ratings review col-5 col-md-5 col-xl-5">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i><span>(3)</span></i>
                                        </div>
                                    </div>
                                    <p class="card-text-review">Some quick example text to build on the card title and
                                        make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 pt-5 review">
                    <div class="container">
                        <div class="col">
                            <div class="card card-review">
                                <div class="card-profile">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden img-card">
                                        <img src="https://i.stack.imgur.com/fcbpv.jpg?s=256&g=1"
                                            class="card-img-top img-cover" alt="Raeesh">
                                    </div>
                                </div>
                                <div class="card-body-review">'
                                    <div class="g-1 d-flex">
                                        <div class="col-7 col-md-7 col-xl-7 name-review">
                                            <h5 class="card-title-review text-left">Ulfiatun Hasanah</h5>
                                        </div>
                                        <div class="small-ratings review col-5 col-md-5 col-xl-5">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i><span>(5)</span></i>
                                        </div>
                                    </div>
                                    <p class="card-text-review">Some quick example text to build on the card title and
                                        make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 pt-5 review">
                    <div class="container">
                        <div class="col">
                            <div class="card card-review">
                                <div class="card-profile">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden img-card">
                                        <img src="https://i.stack.imgur.com/fcbpv.jpg?s=256&g=1"
                                            class="card-img-top img-cover" alt="Raeesh">
                                    </div>
                                </div>
                                <div class="card-body-review">'
                                    <div class="g-1 d-flex">
                                        <div class="col-7 col-md-7 col-xl-7 name-review">
                                            <h5 class="card-title-review text-left">Suroto Edy Nur</h5>
                                        </div>
                                        <div class="small-ratings review col-5 col-md-5 col-xl-5">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                            <i><span>(4)</span></i>
                                        </div>
                                    </div>
                                    <p class="card-text-review">Some quick example text to build on the card title and
                                        make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- webiste review --}}
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 pt-5 review d-none d-lg-block">
                    <div class="container">
                        <div class="col">
                            <div class="card card-review">
                                <div class="card-profile">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden img-card">
                                        <img src="https://i.stack.imgur.com/fcbpv.jpg?s=256&g=1"
                                            class="card-img-top img-cover" alt="Raeesh">
                                    </div>
                                </div>
                                <div class="card-body-review">'
                                    <div class="g-1 d-flex">
                                        <div class="col-7 col-md-7 col-xl-7 name-review">
                                            <h5 class="card-title-review text-left">Nuzul Ridhoi</h5>
                                        </div>
                                        <div class="small-ratings review col-5 col-md-5 col-xl-5">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i><span>(3)</span></i>
                                        </div>
                                    </div>
                                    <p class="card-text-review">Some quick example text to build on the card title and
                                        make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 pt-5 review d-none d-lg-block">
                    <div class="container">
                        <div class="col">
                            <div class="card card-review">
                                <div class="card-profile">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden img-card">
                                        <img src="https://i.stack.imgur.com/fcbpv.jpg?s=256&g=1"
                                            class="card-img-top img-cover" alt="Raeesh">
                                    </div>
                                </div>
                                <div class="card-body-review">'
                                    <div class="g-1 d-flex">
                                        <div class="col-7 col-md-7 col-xl-7 name-review">
                                            <h5 class="card-title-review text-left">Ulfiatun Hasanah</h5>
                                        </div>
                                        <div class="small-ratings review col-5 col-md-5 col-xl-5">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i><span>(5)</span></i>
                                        </div>
                                    </div>
                                    <p class="card-text-review">Some quick example text to build on the card title and
                                        make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 pt-5 review d-none d-lg-block">
                    <div class="container">
                        <div class="col">
                            <div class="card card-review">
                                <div class="card-profile">
                                    <div class="ratio ratio-1x1 rounded-circle overflow-hidden img-card">
                                        <img src="https://i.stack.imgur.com/fcbpv.jpg?s=256&g=1"
                                            class="card-img-top img-cover" alt="Raeesh">
                                    </div>
                                </div>
                                <div class="card-body-review">'
                                    <div class="g-1 d-flex">
                                        <div class="col-7 col-md-7 col-xl-7 name-review">
                                            <h5 class="card-title-review text-left">Suroto Edy Nur</h5>
                                        </div>
                                        <div class="small-ratings review col-5 col-md-5 col-xl-5">
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star rating-color"></i>
                                            <i class="fa fa-star"></i>
                                            <i><span>(4)</span></i>
                                        </div>
                                    </div>
                                    <p class="card-text-review">Some quick example text to build on the card title and
                                        make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="faq pt-2">
    <div class="title-section text-center">
        <h2>Ada Pertanyaan?</h2>
    </div>
    <div class="row pt-2">
        <div class="col-xl-5 col-lg-4 vec-faq d-none d-lg-block">
            <img src="{{ 'assets/img/traveler.png' }}" alt="" class="img-fluid">
        </div>
        <div class="col-xl-7 col-lg-6 align-items-center">
            <div class="card">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        @foreach ($faq as $items)
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button id="{{ $items->id_faq }}" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    {{ $items->faq_pertanyaan }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{ $loop->iteration }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{{ $items->faq_jawaban }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                {{-- <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                            aria-controls="flush-collapseTwo">
                            Bagaimana proses pembayarannya?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Non fames enim purus eget vitae nec viverra.
                            Quam lectus consectetur faucibus eget odio.
                            Nulla aenean nulla pulvinar non.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Bagaimana cara download tiketnya?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Non fames enim purus eget vitae nec viverra.
                            Quam lectus consectetur faucibus eget odio.
                            Nulla aenean nulla pulvinar non.
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>

<!-- <div class="subscribe bg-white pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <h5 class="info-txt">Dapatkan Informasi Terbaru</h5>
                <p class="info-txt text-left">Terkait tempat wisata, diskon, info menarik lainnya</p>
            </div>
            <div class="col-md-6 email-sub d-flex align-items-center">
                <div class="input-group">
                    <input class="form-control" placeholder="Masukan Email Anda" type="text" name="subscribe" id="subscribe">
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="mobile-subscribe bg-white pt-3 pb-3">
    <div class="container">
        <h5 class="info-txt">Dapatkan Informasi Terbaru</h5>
        <p class="info-txt text-left">Terkait tempat wisata, diskon, info menarik lainnya</p>
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
        <form action="{{ route('letter.post') }}" method="POST">
        @csrf
        <div class="input-group ">
            <input class="form-control" placeholder="Masukan Email Anda" type="text" name="subscribe"
                id="subscribe">

            <button class="btn btn-primary" type="submit">Kirim</button>
            </form>

        </div>
    </div>
</div>

<div class="footer">
    <div class="bg-footer">
        <div class="container">
            <div class="container text-white">
                <div class="row pb-5">
                    <div class="col-md-4">
                        <img src="{{ 'assets/img/footerlogo.png' }}" alt="logo-footer">
                        <p class="pt-2" style="color: white">Online Tiket Wisata Jember (OTW Jember) adalah platform
                            tiket wisata Jember yang hadir sebagai solusi bagi masyarakat untuk menikmati obyek wisata
                            Kota Jember dengan kemudahan informasi pemesanan tiket berbasis online. </p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="informasi">Informasi Kontak</h5>
                        <ul class="kontak">
                            <li>0822 5517 2926</li>
                            <li>admin@otwjember.com</li>
                            <li>Jl. Nias No 7 Sumbersari Jember</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="informasi">Social Media</h5>
                        <div class="img-sosmed d-flex">
                            <img src="{{ 'assets/img/ig-btn.png' }}" alt="ig icon">
                            <img src="{{ 'assets/img/fb-btn.png' }}" alt="ig icon">
                            <img src="{{ 'assets/img/tw-btn.png' }}" alt="ig icon">
                            <img src="{{ 'assets/img/yt-btn.png' }}" alt="ig icon">
                        </div>
                    </div>
                </div>
            </div>
            <hr style="height:2px;color:white">
            <div class="container text-white">
                <div class="row pt-3">
                    <div class="col-md-6">
                        Copyright © 2022. Otw jember. All Right Reserved.
                    </div>
                    <div class="col-md-6 footer-right">
                        Made with ♡ by Nias7 Creative Production
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Logout Modal-->
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
</body>
<script src="{{ 'assets/js/bootstrap.js' }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ 'assets/js/style.js' }}"></script>
<script src="{{ 'assets/js/owl.carousel.js' }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
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

</html>
