@extends('layouts.app')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12 text-black">
                    <h1 class="mb-4">Input Form Pembayaran</h1>
                    <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        @if (Auth::check())
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Nama User</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Email User</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        @else
                            <input type="hidden" value="{{ Session::get('id_user') }}" name="user_id">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Nama User</label>
                                <input type="text" class="form-control" value="{{ Session::get('name_user') }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Email User</label>
                                <input type="text" class="form-control" value="{{ Session::get('email_user') }}"
                                    readonly>
                            </div>
                        @endif

                        <input type="hidden" value="{{ $data->id }}" name="kelas_id">
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nama Kelas Yang Dibeli</label>
                            <input type="text" class="form-control" value="{{ $data->nama_kelas }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Harga Kelas</label>
                            <input type="text" class="form-control" value="{{ $data->harga }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Input File Bukti Pembayaran</label>
                            <div class="form-text text-black-50">Please Upload file with this type: png, jpg, jpeg, pdf
                            </div>
                            <input class="form-control" name="bukti_pembayaran" type="file" id="formFile">
                            @error('bukti_pembayaran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Checkout</button>
                        </div>
                    </form>
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
