@extends('layouts.app')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ Storage::url('public/gambar_kelas/').$data->gambar_kelas }}" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $data->nama_kelas }}</h1>
                    <div class="fs-5 mb-5">
                        <span>Rp @convert($data['harga'])</span>
                    </div>
                    <p class="lead">{{ $data->deskripsi }}</p>
                    <div class="d-flex">
                        <a href="{{ route('home') }}">
                            <button class="btn btn-danger flex-shrink-0 me-2" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Kembali
                            </button>
                        </a>
                        @guest
                        <a href="{{ route('datadiri', $data->id) }}">
                            <button class="btn btn-primary flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Beli Sekarang
                            </button>
                        </a>
                        @else
                        <a href="{{ route('checkout.create', $data->id) }}">
                            <button class="btn btn-primary flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Beli Sekarang
                            </button>
                        </a>
                        @endguest
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
 
@endsection
