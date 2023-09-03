@include('frontend.header')
@include('frontend.navbar')
<div class="container profile">
    <div class="card change-pass text-center">
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
        <div class="card-title pt-5">
            <h4 class="profile">Ubah Password</h4>
        </div>

        <div class="edit-body profile">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3 mt-3">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label"></label>
                    <div class="col-12">
                        <input class="form-control" type="password" name="oldPassword" placeholder="Password Lama"
                            required>
                    </div>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label"></label>
                    <div class="col-12">
                        <input class="form-control" type="password" name="password" placeholder="Password Baru"
                            required>
                    </div>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <label for="example-text-input" class="col-md-2 col-form-label form-control-label"></label>
                    <div class="col-12">
                        <input class="form-control" type="password" placeholder="Konfirmasi Password Baru"
                            name="confirmPassword" required>
                    </div>
                </div>
                <div class="btn-change mobile d-grid gap-2 d-block d-lg-none">
                    <button type="submit" class="btn btn-primary change-pass mobile float-righ">Simpan</button>
                    <a href="{{ route('app') }}" class="btn btn-secondary float-right mb-4">Batal</a>
                </div>
                <div class="btn-change d-none d-lg-block">
                    <button type="submit" class="btn btn-primary change-pass mr-3 mb-4">Simpan</button>
                    <a href="{{ route('app') }}" class="btn btn-secondary change-pass mr-3 mb-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Logout Modal-->
<div class=" modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
