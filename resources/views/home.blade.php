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

    <header class=" py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <div class=" w-75 mx-auto mt-5">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner shadow">
                <div class="carousel-item active">
                    <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                        class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="https://swall.teahub.io/photos/small/7-78196_kumpulan-wallpapers-naruto-paling-keren-foto-gambar.jpg"
                        class="d-block w-100 rounded" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                        class="d-block w-100 rounded" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="ratio ratio-16x9 mt-5 w-75 text-center" style="margin:0 auto">
        <iframe src="https://www.youtube.com/embed/EJwwfXOH1ZY" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen class="rounded" style="max-width: 100%;height: 100%;"></iframe>
    </div>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($daftarkelas as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ Storage::url('public/gambar_kelas/') . $item->gambar_kelas }}"
                                alt="..." />
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
                                    <span>Rp.@convert($item['harga'])</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('detail-product', $item->id) }}">Beli Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="content">

            <div class="container card p-5">
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-12">
                        <div class="form h-100">
                            <h3 class="text-center">Contact Us</h3>
                            <form class="mb-5" method="post" id="contactForm" name="contactForm"
                                action="{{ route('contactUs') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label">Name *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="Your name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label">Email *</label>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Your email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label">Phone Number *</label>
                                        <input type="number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" id="phone_number" placeholder="Your Phone Number">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="" class="col-form-label">Subject *</label>
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            name="subject" id="subject" placeholder="Your Subject">
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="message" class="col-form-label">Message *</label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30"
                                            rows="4" placeholder="Write your message"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" value="Send Message"
                                            class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- Footer-->
    <footer class="py-5" style="background-color:#FFFFFF">
        <div class="container">
            <p class="m-0 text-center text-dark">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
@endsection
