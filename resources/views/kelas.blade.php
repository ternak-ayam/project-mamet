@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" style="margin-left: auto; text-align:end">
            <div class="w-100">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" style="text-align:end" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0"
        style="background-color: #F8F7F6 !important;">



        <!-- Section-->
        <section class="py-5" style="padding-top: 4.5rem!important;" id="scrollspyHeading3">
            <p class=""
                style="background-color:#B794FE; padding:20px; font-size:2rem; font-weight:700; text-align:center">UP COMING
                CLASS</p>
            <div class="container bigger w-75 px-4 px-lg-5 mt-5">

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($daftarkelas as $item)
                    @if ($item['kuota'] == 0)
                        
                    @else
                    <div class="col mb-5 w-responsive">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top"
                                src="{{ Storage::url('public/gambar_kelas/') . $item->gambar_kelas }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item['nama_kelas'] }}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span
                                        class="d-block mb-3">{{ \Illuminate\Support\Str::limit($item->deskripsi, 50, $end = '...') }}</span>
                                    <span class="fw-bold">Rp.@convert($item['harga'])</span>
                                    <span
                                        class="d-block mb-3">Kuota Tersedia : <span class="fw-bold">{{ $item['kuota'] }}</span></span>
                                    <span
                                        class=" mb-3"> <span class="fw-bold">{{ $item['hari'] }}</span></span>
                                    <span
                                        class=" mb-3"><span class="fw-bold">{{ $item['jam'] }}</span></span>
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-primary rounded-pill mt-auto"
                                        href="{{ route('detail-product', $item->id) }}">Daftar Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                    @endif
                       
                    @endforeach

                </div>
            </div>
            <style>
                @media screen and (min-width: 775px) {
                    .w-responsive {
                        flex: 0 0 33.3% !important;
                    }
                }

                @media screen and (max-width: 550px) {
                    .w-responsive {
                        flex: 0 0 100% !important;
                    }

                    .w-75 {
                        width: 100% !important;
                    }
                }

                .card-img-top {
                    height: 300px;
                    object-fit: cover;
                }
                .btn-primary{
                    background-color: #8C52FF !important;
                    color: white;
                }
                .btn-primary:hover{
                    background-color: #7835fd !important;
                    color: white;
                }
                .card {
                    background-color: #ffffff;
                    color: black;
                    border: none;
                    border-radius: 15px;
                }

                .card-body.p-4 {
                    padding-bottom: 0px !important;
                }

                .card-footer.p-4.pt-0.border-top-0.bg-transparent {
                    padding-top: 0px !important;
                }
            </style>
        @endsection
