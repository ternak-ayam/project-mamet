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
        <div class="content" id="scrollspyHeading4">
            <div class="p-responsive">
                <div class="container card p-5  d-flex flex-md-row">
                    <div class="row align-items-stretch no-gutters contact-wrap" style="flex: 0 0 50% !important;">
                        <div class="col-md-12">
                            <div class="form mb-5">
                                <h6 class="text-start">Contact Detail</h6>
                                <p>Whatsapp: <span class="text-success text-decoration-none">+62 822 3797 9199</span>
                                </p>
                                <p><a href="https://www.instagram.com/gokreatifbali/?igshid=YmMyMTA2M2Y%3D"><i
                                            class="fa-brands fa-instagram mr-2"></i><span
                                            class="text-primary text-decoration-none">gokreatifbali</span></a></p>
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
            padding: 99px 0;
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
                padding: 180px 0 100px 0;
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
