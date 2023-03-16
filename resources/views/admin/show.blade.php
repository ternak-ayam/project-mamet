@extends('layouts.app')
@section('content')
<style>
    #social-links ul{
         padding-left: 0;
    }
    #social-links ul li {
         display: inline-block;
    } 
    #social-links ul li a {
         padding: 6px;
         border: 1px solid #ccc;
         border-radius: 5px;
         margin: 1px;
         font-size: 25px;
    }
    #social-links .fa-facebook{
          color: #0d6efd;
    }
    #social-links .fa-twitter{
          color: deepskyblue;
    }
    #social-links .fa-linkedin{
          color: #0e76a8;
    }
    #social-links .fa-whatsapp{
         color: #25D366
    }
    #social-links .fa-reddit{
         color: #FF4500;;
    }
    #social-links .fa-telegram{
         color: #0088cc;
    }
    </style>
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
                        <a href="{{ route('dashboard-admin.index') }}">
                            <button class="btn btn-danger flex-shrink-0 me-2" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Kembali
                            </button>
                        </a>
                        <div class="social-btn-sp">
                            {!! $shareButtons1 !!}
                       </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
 
@endsection
