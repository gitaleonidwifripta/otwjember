@include ('frontend.header')
@include ('frontend.navbar')

<!-- Modal mobile -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="sidebar-tgl pt-4">
                    <div class="form-floating mb-3 mt-3 d-none">
                        <input type="date" class="form-control" id="tgl" placeholder="Enter tanggal"
                            name="tgl">
                        <label for="Tanggal">Tanggal</label>
                    </div>
                    <a class="btn btn-primary btn p-2 d-grid gap-2 d-none" href="#" role="button">Cari</a>
                </div>
                <div class="sidebar-filter">
                    <h6 class="txt-booking"> Rating </h6>
                    <div class="form-check rating">
                        <input class="form-check-input" type="checkbox" value="" id="rate5">
                        <label class="form-check-label" for="rate5">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i><span>(5 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate4">
                        <label class="form-check-label" for="rate4">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(4 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate3">
                        <label class="form-check-label" for="rate3">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(3 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate2">
                        <label class="form-check-label" for="rate2">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(2 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate1">
                        <label class="form-check-label" for="rate1">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(1 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="sidebar-harga">
                    <label for="customRange3" class="col-form-label-sm"> Harga</label>
                    <input type="range" class="form-range" min="0" max="5" step="0.5"
                        id="customRange3">
                </div>
                <div class="sidebar-kategori">
                    <h7>Kategori</h7>
                    @foreach ($kategori as $items)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $items->id_kategori }}"
                                id="kat1">
                            <label class="form-check-label" for="kat1">
                                {{ $items->kategori }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="form-order pt-4 mb-5">
    <div class="container">
        <div class="di row">
            <div class="col-md-4 d-none d-md-block">
                <p>
                <div class="sidebar-tgl pt-4">
                    <h1 class="txt-booking" style="font-size:24px"> Booking </h1>
                    <hr />
                    <p></p>
                    <p></p>
                    <h6 class="txt-booking" style="font-size:16px"> Tanggal Booking </h6>
                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" id="tgl" placeholder="Enter tanggal"
                            name="tgl">
                        <label for="Tanggal">Tanggal</label>
                    </div>
                    <a class="btn btn-primary btn p-2 d-grid gap-2" href="#" role="button">Cari</a>
                </div>
                </p>

                <p>
                <div class="sidebar-filter mt-5">
                    <h3 class="txt-booking mt-2" style="font-size:24px"> Filter by </h3>
                    <hr />
                    <h6 class="txt-booking" style="font-size:16px"> Rating </h6>
                    <div class="form-check rating">
                        <input class="form-check-input" type="checkbox" value="" id="rate5">
                        <label class="form-check-label" for="rate5">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i><span>(5 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate4">
                        <label class="form-check-label" for="rate4">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(4 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate3">
                        <label class="form-check-label" for="rate3">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(3 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate2">
                        <label class="form-check-label" for="rate2">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(2 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rate1">
                        <label class="form-check-label" for="rate1">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i><span>(1 Bintang)</span></i>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="sidebar-harga">
                    <label for="customRange3" class="txt-booking col-form-label-sm" style="font-size:16px">
                        Harga</label>
                    <input type="range" class="form-range" min="0" max="5" step="0.5"
                        id="customRange3">
                </div>
                <div class="sidebar-kategori">
                    <h7 class="txt-booking" style="font-size:16px">Kategori</h7>
                    <p> </p>
                    @foreach ($kategori as $items)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $items->id_kategori }}"
                                id="kat1">
                            <label class="form-check-label" for="kat1">
                                {{ $items->kategori }}
                            </label>
                        </div>
                    @endforeach

                </div>
                </p>
            </div>

            <div class="col-12 col-md-8">
                <div class="list-wisata pt-4">
                    <div class="row">
                        <div class="col-2 email-sub d-flex align-items-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary d-md-none d-block" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="fa-solid fa-filter"></i>
                            </button>
                        </div>
                        <div class="col-10 email-sub d-flex align-items-center d-block d-md-none">
                            <div class="input-group">
                                <input class="form-control" id="tgl" placeholder="Masukan Tanggal"
                                    type="date" name="tgl" id="subscribe">

                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>

                    @foreach ($destinasi as $items)
                        <div class="card-booking mb-3 mt-2" style="max-width: auto; background-color:white">
                            <div class="row g-0 mt-3">
                                <div class="col-4 col-md-4 img-booking">
                                    @if ($items->gambar_des)
                                        <img src="{{ asset('/upload/' . $items->gambar_des) }}" class="card-img-left"
                                            alt="...">
                                    @else
                                        <img src="assets/pict/sample-1.png " class="card-img-left" alt="...">
                                    @endif
                                </div>
                                <div class="col-8 col-md-8">
                                    <div class="list-wisata">
                                        <div class="row booking">
                                            <div class="col-12 col-md-12">
                                                <h3 class="card-title wisata">{{ $items->nama_des }}</h3>
                                                <div class="small-ratings booking">
                                                    <i class="fa fa-star rating-color fa-2xs"></i>
                                                    <i class="fa fa-star rating-color fa-2xs"></i>
                                                    <i class="fa fa-star rating-color fa-2xs"></i>
                                                    <i class="fa fa-star rating-color fa-2xs"></i>
                                                    <i class="fa fa-star fa-2xs"></i>
                                                    <i><span class="number">(4)</span></i>
                                                </div>
                                            </div>
                                            <div class=" col-7 col-md-8">
                                                <div class="location-booking">
                                                    <p class="txt-location"><i
                                                            class="fa-solid fa-location-dot fa-2xs"></i>
                                                        {{ $items->alamat }}</span></p>
                                                </div>
                                                <div class="row d-flex justify-content-center align-items-center time">
                                                    <div class="col-4 col-md-4 info-destination text-center">
                                                        <p class="txt-info-booking">Jam Buka</p>
                                                        <p class="txt-jam-booking">08.00</p>
                                                    </div>
                                                    <div class=" col-4 col-md-4 info-destination text-center">
                                                        <p class="txt-info-booking">Jam Tutup</p>
                                                        <p class="txt-jam-booking">17.00</p>
                                                    </div>
                                                    <div class=" col-4 col-md-4 info-destination text-center">
                                                        <p class="txt-info-booking">Status</p>
                                                        <p
                                                            class="{{ $items->status_des == 'Buka' ? 'badge bg-success badge-list' : 'badge bg-danger badge-list' }}">
                                                            {{ $items->status_des == 'Buka' ? 'buka' : 'Tutup' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-4">
                                                <div class="harga text-center">
                                                    <h6 class="txt-tiket booking">Harga Tiket</h6>
                                                    <p class="txt-harga booking">Rp.7.000 s/d
                                                        Rp.15.000
                                                    </p>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <a class="btn btn-primary pesan-booking"
                                                        href="{{ route('cari_wisata', ['destinasi' => $items->id_destinasi]) }}">Pesan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.footer')







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
<script src="{{ 'assets/js/bootstrap.js' }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="{{ 'assets/js/style.js' }}"></script>
