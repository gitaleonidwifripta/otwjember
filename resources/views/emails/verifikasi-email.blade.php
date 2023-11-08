@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card">
                <div class="card-header fw-bold">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    Hello , {{ $details['email'] }} <br>
                    {{ __('Silahkan Klik Button Dibawah Ini untuk proses verifikasi email anda.') }}
                    {{-- <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form> --}}
                </div>
                <div class="card-footer">
                    <a href="{{ route('verification.resend',$details['id']) }}" class="btn btn-primary align-baseline">{{ __('Klik Untuk Verifikasi ') }}</a>.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
