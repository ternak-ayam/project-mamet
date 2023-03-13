@extends('layouts.app')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12 text-black">
                    <h1 class="mb-4">Input Data Diri</h1>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('storedatadiri') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nama User</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Email User</label>
                            <input type="text" class="form-control" name="email" >
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Nama Orang Tua</label>
                            <input type="text" class="form-control" name="nama_orangtua" >
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Nomor Hp</label>
                            <input type="number" class="form-control" name="no_telp" >
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" >
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
