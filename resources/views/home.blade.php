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
                            <h1 class="display-1 fw-bolder text-stickleft text-white p-77">Go <span
                                    class="d-block">Kreatif</span></h1>
                        </div>
                    </div>
                </div>
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-black d-flex flex-col">
                        <p class="lead fw-normal text-stickleft bottom-align-text text-white mb-0">Gokreatif adalah
                            sebuah wadah bagi
                            masyarakat luas untuk meningkatkan kreatifitas dan keterampilan mereka</p>

                    </div>
                </div>
            </section>

            <section class=" b-responsive">
                <div class="d-flex flex-md-row " style="overflow-x:scroll; ">
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="{{ url('/img/home/art.jpg')}}"
                            class="img-fluid max-widths">
                        <a href="{{ route('gallery') }}/#artandcraft" class="text-black text-decoration-none">
                            <div class="card display rounded-pill">
                                <p class="text-center m-0 display-7"> Art and Craft </p>
                            </div>
                        </a>
                    </div>
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="{{ url('/img/home/flower.jpg') }}"
                            class="img-fluid max-widths">
                        <a href="{{ route('gallery') }}/#flowerclass" class="text-black text-decoration-none">
                            <div class="card display rounded-pill">
                                <p class="text-center m-0 display-7"> Flower Class </p>
                            </div>
                        </a>
                    </div>
                    <div class="mx-auto row rows mx-6 mx-md-0 my-3 flexgrow">
                        <img src="{{ url('/img/home/painting.jpg') }}"
                            class="img-fluid max-widths">
                        <a href="{{ route('gallery') }}/#paintingclass" class="text-black text-decoration-none">
                            <div class="card display rounded-pill">
                                <p class="text-center m-0 display-7"> Painting Class </p>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <div class="text-center d-flex w-75 my-0 mx-auto flex-col justify-content-start">
                <p class="fw-bold font-size text-stickleft bottom-align-text text-black">
                    Visi GoKreatif
                </p>
                <p class="lead fw-normal text-stickleft bottom-align-text text-black mb-5">
                    Visi GoKreatif adalah
                    terwujudnya wadah bagi masyarakat untuk meningkatkan kreativitas dan keterampilan mendukung
                    kemajuan Teknologi.
                </p>
                <p class="fw-bold font-size text-stickleft bottom-align-text text-black">
                    Misi GoKreatif </p>
                <p class="lead fw-normal text-stickleft bottom-align-text text-black mb-5">
                    Misi GoKreatif adalah
                    menyelenggarakan kelas ketrampilan yang kreatif,
                    Menciptakan masyarakat yang memiliki kompetensi dan professional,
                    Memberikan tempat bagi masyarakat untuk mengembangkan kreatifitas,
                    Menjalin kerjasama dengan berbagai bidang.</p>
            </div>
        </header>
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
            height: auto;
            background-image: url("{{ asset('img/home.jpg') }}");
            background-size: cover;
            background-position: center;
            position: relative;
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

        .b-responsive {
            padding: 70px 0;
        }

        .font-size {
            font-size: 2.1rem;
            text-align: center;
            margin-bottom: 30px;
        }

        @media screen and (min-width: 775px) {
            .font-size {
                font-size: 2rem;
                text-align: start;
            margin-bottom: 30px;
            }

            .display {
                width: 60%;
            }

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
                height: auto;
                background-image: url("{{ asset('img/home.jpg') }}");
                background-size: cover;
                background-position: center;
                position: relative;
                /* box-shadow: inset 0px -8px 29px 8px #ACCBBD; */
                padding: 100px 0 0 0;
            }

            .b-responsive {
                padding: 100px 70px 168px 70px;
            }

            .flex-col {
                flex-direction: column;
                align-items: flex-end;
                margin-top: 138px;
            }

            .text-center.d-flex.w-75.my-0.mx-auto.flex-col.justify-content-start {
                align-items: unset !important;
            }

            .card-img-top {
                height: 17vw !important;
            }

        }

        @media screen and (max-width: 550px) {
            .w-75 {
                width: 87% !important;
            }

            .flex-col {
                flex-direction: column !important;
                text-align: justify !important;
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
@endsection
