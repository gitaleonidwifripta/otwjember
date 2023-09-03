@extends('layouts.app')
@include('frontend.header')
@section('content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 px-0 d-none d-lg-block">
                <img src="{{ 'assets/img/traveler4.png' }}" alt="Login image" class="w-100 vh-110" style="object-fit: cover;">
            </div>
            <div class="col-lg-6 text-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <section class="top-content bb d-flex justify-content-between">
                                <div class="logo py-4">
                                    <img src="{{('assets/img/otwjember.png')}}" alt="" class="g-login">
                                </div>
                            </section>
                            <div class="card">
                                <!-- <div class="card-header">{{ __('Register') }}
                                </div> -->
                                <div class="form-floating mt-4">
                                    <h4 style="text-align:center" class="fw-bold">Daftar</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register.custom') }}">
                                        @csrf

                                        <div class="form-floating mb-3">
                                            <input id="name" type="text" placeholder="Enter name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <label for="name">Nama Lengkap</label>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 mt-3">
                                            <input id="email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 mt-3">
                                            <input id="nohp" type="number" placeholder="Enter nohp" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}" required autocomplete="nohp">
                                            <label for="nohp">Nomor Ponsel</label>
                                            @error('nohp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 mt-3">
                                            <input id="password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            <label for="password">Kata Sandi</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 mt-3">
                                            <input id="password-confirm" type="password" placeholder="Enter confirm password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            <label for="password-confirm">{{ __('Konfirmasi Kata Sandi') }}</label>
                                        </div>

                                        <div style="text-align:center">Setuju dengan <a href="{{ route('password.request') }}" class="link-info">syarat & ketentuan</a></div>
                                        <p></p>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary mb-3">
                                                {{ __('Register') }}
                                            </button>
                                        </div>

                                        <p class="small" style="text-align:center">------- atau daftar dengan -------</p>

                                        <!-- <div class="row">
                                            <div class="d-grid col-6">
                                                <button type="submit" class="btn btn-danger mb-3"><i class="fa-brands fa-google"></i> Google</button>
                                            </div>
                                            <div class="d-grid col-6">
                                                <button type="submit" class="btn btn-primary active mb-3"><i class="fa-brands fa-facebook"></i> Facebook</button>
                                            </div>
                                        </div> -->

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-danger mb-3"><i class="fa-brands fa-google"></i> Google</button>
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary active mb-3"><i class="fa-brands fa-facebook"></i> Facebook</button>
                                        </div>

                                        <div style="text-align:center">Sudah punya akun? <a href="{{ route('login') }}" class="link-info">Masuk</a></div>

                                    </form>
                                </div>
                            </div>
                            <p></p>
                            <p class="small">© 2022 OTW Jember. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection