@extends('layouts.app')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12 text-black">
                    <h1 class="mb-4">Input Data Diri</h1>
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
                            <label for="inputAddress2" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" >
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" >
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
    <!-- Footer-->
    <footer class="py-5" style="background-color:#FFFFFF">
        <div class="container">
            <p class="m-0 text-center text-dark">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
@endsection
