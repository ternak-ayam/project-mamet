@extends('dashboard')
@section('content')
    <form action="{{ route('store-list-member') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Tambah User</p>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Nama </label>
                <input class="form-control" type="text" name="name" >
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Email</label>
                <input class="form-control" type="text" name="email"
                    >
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Nama Orang Tua</label>
                <input class="form-control" type="text" name="nama_orangtua" >
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">No Telepon</label>
                <input class="form-control" type="text" name="no_telp"  >
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Alamat</label>
                <input class="form-control" type="text" name="alamat"  >
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Password</label>
                <input class="form-control" type="password" name="password"  >
            </div>
            <div class="form-group col-12 col-md-8  mb-3" style="margin: 0 auto">
                <label class="mx-2">Role</label>
                <select class="form-control" id="name" name="role">

                    @foreach ($role as $item)
                        <option value="{{ $item->role }}">{{ $item->role }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="row">
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <button class="btn btn-primary" type="submit"><a> Submit </a></button>
                    </div>
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <a class="btn btn-danger" href="{{ route('list-member') }}">Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
