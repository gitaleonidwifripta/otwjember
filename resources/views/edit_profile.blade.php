@include('frontend.header')
@include('frontend.navbar')
<div class="container profile">
    <div class="card text-center">
        <div class="card-title pt-5">
            <h4 class="profile">Edit Profile</h4>
        </div>
        <div class="circular-image d-flex mx-auto">
            <img src="{{$user->detail_user != null ?  asset('upload/fotoprofil/'.$user->detail_user->foto_profil) : asset('assets/pict/fp.jpg') }}" id="photosPreview" class="rounded-circle profile mx-auto" width="300px" height="300px" alt="...">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="btn-round">
                <input type="file" id="gambar_konten" name="gambar_konten" value="{{ old('gambar_konten') }}" />
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </div>
        </div>
        <div class="edit-body profile">

                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="name"
                        value="{{ $user->name }}">
                    <label for="nama">Nama Lengkap</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" disabled
                        value="{{ $user->email }}">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="nomor" placeholder="Enter nomor" name="nohp"
                        value="{{ $user->nohp }}">
                    <label for="nomor">Nomor Telepon</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <select type="text" class="form-control" id="jenis_klm" placeholder="Enter jenis_klm"
                        name="jenis_klm" >
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        @if ($user->detail_user != null)
                            <option value="lk" {{ $user->detail_user->jenis_klm == 'lk' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="pr" {{ $user->detail_user->jenis_klm == 'pr' ? 'selected' : '' }}>Perempuan</option>
                        @else
                            <option value="lk" >Laki-laki</option>
                            <option value="pr" >Perempuan</option>
                        @endif
                    </select>
                    <label for="nama">Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control @error('alamat_user')
                    is-invalid
                    @enderror"" id="alamat_user" placeholder="Enter alamat"
                        name="alamat_user" value="{{ $user->detail_user != null ? $user->detail_user->alamat_user : ''}}">
                    <label for="nama">Alamat</label>
                    @error('alamat_user')
                        <div class="invalid-feedback">
                            <i class="bi bi-radio-circle"></i>
                            {{$message}}.
                        </div>
                    @enderror
                </div>
                {{-- <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                        name="password">
                    <label for="password">Kata Sandi</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="cfrm_pwd" placeholder="Enter cfrm_pwd"
                        name="cfrm_pwd">
                    <label for="cfrm_pwd">Konfirmasi Kata Sandi</label>
                </div> --}}
                <div class="btn-up">
                    <button type="submit" class="btn btn-primary float-right"
                        onclick="javascript:alert('Data Anda telah diperbarui');">Simpan</button>
                </div>
            </form>
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
<script src="{{ 'assets/js/bootstrap.js' }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="{{ 'assets/js/style.js' }}"></script>
