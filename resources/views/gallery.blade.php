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
        <div class="p-responsive">
            {{-- section 2 --}}
            <div class="ratio ratio-16x9 mt-5 w-75 text-center" style="margin:0 auto">
                {{-- <iframe src="https://www.youtube.com/embed/EJwwfXOH1ZY" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen class="rounded" style="max-width: 100%; height: 100%;"></iframe> --}}
                <iframe src="https://www.youtube.com/embed/4B-mDBXue5M" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    style="width: 100%; height: 100%;" class="rounded" allowfullscreen></iframe>
            </div>



            <p class="purple text-center" id="paintingclass">Kegiatan Kelas Mewarnai</p>
            <p class="text-center fs-4 mb-3" id="flowerclass">Kelas mewarnai anak-anak adalah sebuah kelas yang dirancang khusus untuk mengajarkan anak-anak bagaimana cara mewarnai dengan benar dan membuat karya seni yang indah. Kelas ini cocok bagi anak-anak yang senang dengan seni dan ingin mengembangkan kreativitas mereka melalui seni mewarnai.
            </p>
            <p class="text-center fs-4" id="flowerclass">
                Dalam kelas ini, anak-anak akan belajar mengenai warna, komposisi dan teknik-teknik mewarnai yang berbeda, seperti blending atau shading. Mereka akan diajarkan bagaimana memilih warna yang tepat untuk menghasilkan karya seni yang harmonis dan menarik.</p>
            <div id="owl-demo" class="owl-carousel owl-theme w-75 my-0 mx-auto p-4">

                @foreach ($painting as $item)
                    <div class="item">
                        <img src="{{ url('storage/gambar_kegiatan_kelas/' . $item->gambar) }}" class="img-fluid">
                    </div>
                @endforeach
            </div>
            <div class="navigation">
                <div class="prev"></i></div>
                <div class="next"></i></div>
            </div>
            <p class="purple text-center" id="flowerclass">Kegiatan Kelas Merakit Bunga</p>
            <p class="text-center fs-4 mb-3" id="flowerclass">Kelas merakit bunga untuk anak-anak adalah sebuah kelas yang
                dirancang khusus untuk mengajarkan anak-anak bagaimana membuat bunga buatan mereka sendiri. Kelas ini cocok
                bagi anak-anak yang senang dengan kerajinan tangan dan ingin belajar membuat bunga yang indah dan menarik.
            </p>
            <p class="text-center fs-4" id="flowerclass">
                Dalam kelas ini, anak-anak akan belajar cara membuat bunga dari berbagai bahan seperti kertas, kain flanel,
                atau kain perca. Mereka akan belajar teknik-teknik sederhana seperti memotong, melipat, dan merekatkan
                bahan-bahan tersebut untuk membuat bunga.</p>

            <div id="owl-demo2" class="owl-carousel owl-theme w-75 my-0 mx-auto p-4">
                @foreach ($flower as $item)
                    <div class="item">
                        <img src="{{ url('storage/gambar_kegiatan_kelas/' . $item->gambar) }}" class="img-fluid">
                    </div>
                @endforeach

            </div>
            <div class="navigation">
                <div class="prev"></i></div>
                <div class="next"></i></div>
            </div>
            <p class="purple text-center" id="artandcraft">Kegiatan Kelas Kerajinan</p>
            <p class="text-center fs-4 mb-3" id="flowerclass">Kelas membuat kerajinan anak-anak adalah sebuah kelas yang dirancang khusus untuk mengajarkan anak-anak bagaimana cara membuat kerajinan tangan yang kreatif dan menarik. Kelas ini cocok bagi anak-anak yang senang dengan kerajinan tangan dan ingin mengembangkan kreativitas mereka melalui membuat kerajinan tangan.
            </p>
            <p class="text-center fs-4" id="flowerclass">
                Dalam kelas ini, anak-anak akan belajar membuat kerajinan tangan dari bahan-bahan yang mudah didapat, seperti kertas, kain flanel, kayu, dan lain sebagainya. Mereka akan diajarkan teknik-teknik dasar seperti memotong, menempel, dan menghias bahan-bahan tersebut untuk membuat kerajinan yang cantik dan menarik.</p>
            <div id="owl-demo3" class="owl-carousel owl-theme w-75 my-0 mx-auto p-4">

                @foreach ($art as $item)
                    <div class="item">
                        <img src="{{ url('storage/gambar_kegiatan_kelas/' . $item->gambar) }}" class="img-fluid">
                    </div>
                @endforeach

            </div>
            <div class="navigation">
                <div class="prev"></i></div>
                <div class="next"></i></div>
            </div>


        </div>
    </div>


    <style>
        p#flowerclass {
            width: 70%;
            margin: 0 auto;
        }

        p.purple#flowerclass {
            margin-bottom: 42px;
        }

        button.owl-prev {
            position: absolute;
            left: 0;
            bottom: 0;
            top: 0;
        }

        button.owl-next {
            position: absolute;
            right: 0;
            bottom: 0;
            top: 0;
        }

        svg.svg-inline--fa.fa-angle-left,
        svg.svg-inline--fa.fa-angle-right {
            font-size: 40px;
            color: #A274FD;
        }

        .owl-stage-outer {
            margin-top: 20px;
        }


        #owl-demo .item,
        #owl-demo2 .item,
        #owl-demo3 .item {
            margin: 3px;
        }

        #owl-demo .item img,
        #owl-demo2 .item img,
        #owl-demo3 .item img {
            display: block;
            width: 450px;
            height: 250px;
            object-fit: cover;
        }

        .purple {
            margin: 60px 0 30px 0;
            word-wrap: break-word;
            font-size: 2.6rem;
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
            padding: 23px 0;
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
                padding: 23px 0 0 0;
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
        $(document).ready(function() {
            $('#owl-demo').owlCarousel({
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                loop: true,
                nav: true,
                navigation: true,
                navigationText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 4
                    },

                }
            });
            $('#owl-demo').trigger('owl.play', 2000);
            $('#owl-demo2').owlCarousel({
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                loop: true,
                nav: true,
                navigation: true,
                items: 4,
                navigationText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 4
                    },

                }
            });
            $('#owl-demo2').trigger('owl.play', 2000);
            $('#owl-demo3').owlCarousel({
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                loop: true,
                nav: true,
                items: 4,
                navigation: true,
                navigationText: [
                    "<i class='icon-chevron-left icon-white'><</i>",
                    "<i class='icon-chevron-right icon-white'>></i>"
                ],
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 4
                    },

                }
            });
            $('#owl-demo3').trigger('owl.play', 2000);
        });
    </script>
@endsection
