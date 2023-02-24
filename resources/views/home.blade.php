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
    <style>
        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }



        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }

        .carousel-item {
            max-height: 40vw !important;
        }

        .purple-card {
            background-color: #B693FB !important;
            border-radius: 20px;
        }

        nav#mainNav {
            background-color: white;
        }


        .p-responsive {
            padding: 79px 0;
        }

        .display-1 {
            font-weight: 500 !important;
        }

        .display-7 {
            font-size: 1.5rem;
            font-weight: 400 !important;
        }

        .display {
            display: block;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
            width: 80%;
            padding: 15px;
            margin: 0 auto;
            bottom: 38px;
        }

        @media screen and (min-width: 775px) {
            .bigger {
                max-width: 100%;
            }

            .mx-md-6 {
                margin-left: 5rem !important;
                margin-right: 5rem !important;
            }

            .p-77 {
                padding-left: 77px;
            }

            .purple-card {
                margin-left: 33px;
            }

            .max-widths {
                max-width: 300px !important;
                height: 250px !important;
            }

            .text-stickleft {
                text-align: left;
            }

            .p-responsive {
                padding: 100px 0 0 0;
            }

            .b-responsive {
                padding: 0 70px 168px 70px;
            }

            .flex-col {
                flex-direction: column;
                align-items: flex-end;
                margin-top: 138px;

            }

            .card-img-top {
                height: 17vw !important;
            }

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        @media screen and (max-width: 550px) {
            .w-75 {
                width: 87% !important;
            }

            input.btn.btn-primary.rounded-0.py-2.px-4 {
                width: 100% !important;
                border-radius: 20px !important;
            }
        }

        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
            .flexgrow{
                flex: 0 0 100% !important;
            }
        }
    </style>
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0"
        style="background-color: #F8F7F6 !important;">
        <header class=" py-5" id="scrollspyHeading1">
            <section class="d-flex flex-md-row flex-column p-responsive">
                <div class="container px-4 px-lg-5 my-5 ">
                    <div class="text-center text-black">
                        <div class="card purple-card text d-flex justify-content-end">
                            <h1 class="display-1 fw-bolder text-stickleft p-77">Go <span class="d-block">Kreatif</span></h1>
                        </div>
                    </div>
                </div>
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-black d-flex flex-col">
                        <p class="lead fw-normal text-stickleft bottom-align-text text-black-50 mb-0">Gokreatif adalah
                            sebuah wadah bagi
                            masyarakat luas untuk meningkatkan kreatifitas dan keterampilan mereka</p>
                    </div>
                </div>
            </section>

            <section class=" b-responsive">
                <div class="d-flex flex-md-row flex-column" style="overflow-x:scroll; ">
                    <div class="mx-auto mx-md-6 my-3 flexgrow">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://cdn.pixabay.com/photo/2017/11/15/13/27/river-2951997_960_720.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto mx-md-6 my-3 flexgrow ">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                </div>
            </section>
        </header>



        <div class="container text-center my-3" id="scrollspyHeading2">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                                            class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 1</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://swall.teahub.io/photos/small/7-78196_kumpulan-wallpapers-naruto-paling-keren-foto-gambar.jpg"
                                            class="img-fluid">
                                    </div>
                                    <div class="card-img-overlay">Slide 2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>




        {{-- <div class=" w-75 mx-auto mt-5">
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
    </div> --}}
        <div class="ratio ratio-16x9 mt-5 w-75 text-center" style="margin:0 auto" id="scrollspyHeading2">
            <iframe src="https://www.youtube.com/embed/EJwwfXOH1ZY" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen class="rounded" style="max-width: 100%;height: 100%;"></iframe>
        </div>
        <!-- Section-->
        <section class="py-5" id="scrollspyHeading3">
            <div class="container bigger w-75 px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($daftarkelas as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top"
                                    src="{{ Storage::url('public/gambar_kelas/') . $item->gambar_kelas }}"
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
                                    <div class="text-center"><a class="btn btn-primary mt-auto"
                                            href="{{ route('detail-product', $item->id) }}">Beli Sekarang</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="content" id="scrollspyHeading4">

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
                                            <input type="text"
                                                class="form-control  @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="Your email">
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
                                            <input type="text"
                                                class="form-control @error('subject') is-invalid @enderror" name="subject"
                                                id="subject" placeholder="Your Subject">
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
    </div>
    </section>


    <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>
@endsection
