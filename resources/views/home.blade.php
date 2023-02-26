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
        {{-- section 1 --}}
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
                        <p class="lead fw-normal text-stickleft bottom-align-text text-black mb-0">Gokreatif adalah
                            sebuah wadah bagi
                            masyarakat luas untuk meningkatkan kreatifitas dan keterampilan mereka</p>
                    </div>
                </div>
            </section>

            <section class=" b-responsive">
                <div class="d-flex flex-md-row " style="overflow-x:scroll; ">
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="https://cdn.pixabay.com/photo/2013/10/02/23/03/dog-190056_960_720.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="https://cdn.pixabay.com/photo/2017/11/15/13/27/river-2951997_960_720.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                            class="img-fluid max-widths">
                        <div class="card display rounded-pill">
                            <p class="text-center m-0 display-7"> Art and Craft </p>
                        </div>
                    </div>
                </div>
            </section>
        </header>

        {{-- section 2 --}}
        <div class="ratio ratio-16x9 mt-5 w-75 text-center" style="margin:0 auto" id="scrollspyHeading2">
            <iframe src="https://www.youtube.com/embed/EJwwfXOH1ZY" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen class="rounded" style="max-width: 100%; height: 100%;"></iframe>
        </div>

        <div class="container text-center my-3" id="scrollspyHeading2">
            <div class="row mx-auto my-auto justify-content-center">
                <p class="purple">Go Kreatif aktivity on ashdahsdhasjhdadhadshahdkahdkahdkjah</p>
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="https://pinhome-blog-assets-public.s3.amazonaws.com/2021/11/Gambar-Kartun-Keren-Background-Hitam.jpg"
                                            class="img-fluid">
                                    </div>
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


        <div class="content" id="scrollspyHeading4">

            <div class="container card p-5 d-flex flex-md-row">
                <div class="row align-items-stretch no-gutters contact-wrap" style="flex: 0 0 50% !important;">
                    <div class="col-md-12">
                        <div class="form mb-5">
                            <h6 class="text-start">Contact Detail</h6>
                            <p>Whatsapp: <span class="text-success text-decoration-underline">+62 837 2398 3247</span></p>
                            <p><span class="text-success text-decoration-underline">ahaiemail@gmail.com</span></p>
                            <p><span class="text-success text-decoration-underline">maestro@gmail.com</span></p>
                            <p><span class="text-success text-decoration-underline">sozialice@gmail.com</span></p>
                        </div>
                        <div class="form mb-5">
                            <h6 class="text-start">Go Kreatif Address</h6>
                            <p>Jalan Dahlia Raya, Pecatu, Kuta Selatan, Kabupaten Badung, Bali</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-12">
                        <div class="form h-100">
                            <h6 class="text-start">Contact Form</h6>
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
    </div>
    </section>
    <style>
        
        .purple {
            margin: 60px 0;
            word-wrap: break-word;
            font-size: 1.5rem;
            color: #B693FB !important;
            font-weight: bolder !important;
        }

        .carousel-item1 {
            max-height: 40vw !important;
        }

        span.carousel-control-next-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%238C52FF' width='18' height='38' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
        }

        span.carousel-control-prev-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%238C52FF' width='18' height='18' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
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

        img.img-fluid {
            width: 450px;
            height: 250px;
            object-fit: cover;
        }

        .display {
            display: block;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
            width: 80%;
            padding: 15px;
            margin: 0 auto;
            bottom: 38px;
        }

        .max-widths {
            max-width: 100% !important;
            height: 250px !important;
            margin: 0 auto;
        }

        @media screen and (min-width: 775px) {
            .bigger {
                max-width: 100%;
            }

            .carousel-inner {
                width: 80%;
                margin: 0 auto;
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
                max-width: 450px !important;
                height: 250px !important;
                margin: 0 auto;
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

        }

        @media screen and (max-width: 550px) {
            .w-75 {
                width: 87% !important;
            }

            input.btn.btn-primary.rounded-0.py-2.px-4 {
                width: 100% !important;
                border-radius: 20px !important;
            }

            .display-1 {
                font-size: 4.5rem !important;
            }

            .container.px-4.px-lg-5.my-5 {
                margin-bottom: 0px !important;
            }

            .container.px-4.px-lg-5.my-5 {
                margin-top: 0px !important;
            }

            .flexgrow {
                flex: 0 0 100% !important;
            }
        }

        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }
    </style>

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
