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
                                    <h4 class="fw-bold ">Lupa Password</h4>
                                    <p>Silahkan masukkan email anda!</p>
                                </div>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <form action="{{ route('password.email') }}" method="POST">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <input id="email" placeholder="email" type="email" class="form-control py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary mt-3 w-100 py-3">Kembali</a>
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
