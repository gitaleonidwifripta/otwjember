@extends('backend/layouts.template')
@section('content')
@include('backend/layouts.navbar')

<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">FAQ</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.faq')}}">Lihat FAQ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-wrapper">
                <!-- HTML5 inputs -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit FAQ</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.faq.update', $faq->id_faq)}}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <input type="hidden" name="id_faq" value="{{ $faq->id_faq }}">
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Pertanyaan</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="faq_pertanyaan" value="{{ $faq->faq_pertanyaan }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label form-control-label">Pertanyaan</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="faq_jawaban" rows="3">{{ $faq->faq_jawaban }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            <a href="{{ route('admin.faq') }}" class="btn btn-secondary mr-3 float-right">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection