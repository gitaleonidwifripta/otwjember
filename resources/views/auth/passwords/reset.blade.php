@extends('layouts.app')
@include('frontend.header')
@section('content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 text-black ">
                <div class="container">
                    <section class="top-content bb d-flex justify-content-between">
                        <div class="logo py-4">
                            <img src="{{ asset('assets/img/otwjember.png')}}" alt="" class="g-register">
                        </div>
                    </section>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-8 ">
                            <div class="card h-100 border-0">

                                <div class="form-floating mt-4 mx-3">
                                    <h4 class="fw-bold ">Ganti Password</h4>
                                    <p>Silahkan masukkan password baru anda!</p>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

                                            <div class="col-md-12">
                                                <input id="email" type="email" readonly class="form-control py-3 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                                            <div class="col-md-12">
                                                <input id="password" type="password" placeholder="Password minimal 8 karakter" class="form-control py-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-12 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-12">
                                                <input id="password-confirm" type="password" placeholder="Ulangi password" class="form-control py-3" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary w-100 py-3">
                                                    {{ __('Ubah') }}
                                                </button>
                                            </div>
                                        </div>
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
                <img src="{{ asset('assets/img/traveler3.png') }}" alt="Login image" class="w-100 vh-110" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>
@endsection
