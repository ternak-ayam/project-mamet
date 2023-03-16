@extends('dashboard')
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 my-0 mx-auto">
                <div class="card p-4 mb-4 rounded">
                    <div class="card w-auto">
                        @foreach ($data as $item)
                            
                        <p class="text-center">Silahkan Download Bukti Pembayaran dan Konfirmasi Pembayaran Via Whatsapp 0898989891</p>
                        <a class="text-center" href="{{ route('dashboard-nonuser-cetak', $item->id) }}">
                            <button type="button"
                                class="btn btn-success ml-2">
                                <i class="fa fa-print"></i> Download Bukti Pembayaran
                            </button>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="card p-4 rounded">
                    <div class="card w-auto">
                        <p class="text-center">Silahkan Register Untuk Menjadi Member Go Kreatif Untuk Melihat Info Jadwal Kelas dan Sertifikat</p>
                        <img src="{{ asset('img/logo.jpg') }}" class="my-4 mx-auto" style="width: 150px" alt="">
                        <a class="text-center" href="{{ route('register-nonuser') }}">
                            <button type="button"
                                class="btn btn-primary ml-2">
                                <i class="fa-regular fa-address-card"></i> Register
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        body {
            background: #edf1f5;
            margin-top: 20px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }

        .btn-circle.btn-lg,
        .btn-group-lg>.btn-circle.btn {
            width: 50px;
            height: 50px;
            padding: 14px 15px;
            font-size: 18px;
            line-height: 23px;
        }

        .text-muted {
            color: #8898aa !important;
        }

        [type="button"]:not(:disabled),
        [type="reset"]:not(:disabled),
        [type="submit"]:not(:disabled),
        button:not(:disabled) {
            cursor: pointer;
        }

        .btn-circle {
            border-radius: 100%;
            width: 40px;
            height: 40px;
            padding: 10px;
        }

        .user-table tbody tr .category-select {
            max-width: 150px;
            border-radius: 20px;
        }
    </style>
@endsection
