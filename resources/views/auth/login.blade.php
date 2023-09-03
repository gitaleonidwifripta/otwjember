@extends('layouts.app')
@include('frontend.header')
@section('content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <section class="top-content bb d-flex justify-content-between">
                                <div class="logo py-4">
                                    <img src="{{('assets/img/otwjember.png')}}" alt="" class="g-register">
                                </div>
                            </section>
                            <div class="card">

                                <!-- <div class="card-header">{{ __('Login') }}
                                </div> -->
                                <div class="form-floating mt-4">
                                    <h4 style="text-align:center" class="fw-bold">Masuk</h4>
                                </div>
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
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-floating mb-3">
                                            <input id="email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label for="email">Masukkan Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3 mt-3">
                                            <input id="password" type="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            <label for="password">Kata Sandi</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Checkbox -->
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Ingat saya') }}
                                                </label>
                                            </div>
                                            <div>Lupa kata sandi? <a href="{{ route('password.request') }}" class="link-info">Klik disini</a>
                                            </div>
                                        </div>

                                        <p></p>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary mb-3" type="button">Login
                                            </button>
                                        </div>

                                        <p class="small" style="text-align:center">------- atau masuk dengan -------
                                        </p>

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

                                        <div style="text-align:center">Belum punya akun? <a href="{{ route('register') }}" class="link-info">Daftar</a></div>

                                    </form>
                                </div>
                            </div>
                            <p></p>
                            <p class="small">© 2022 OTW Jember. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-lg-block">
                <img src="{{ 'assets/img/traveler3.png' }}" alt="Login image" class="w-100 vh-110" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>
@endsection