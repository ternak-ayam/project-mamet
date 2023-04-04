@extends('dashboard')
@section('content')
    <form action="{{ route('update-data-kelas-topmanajemen', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Edit Kelas</p>
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3 " style="margin: 0 auto">
                <input type="text" class="form-control" id="floatingInput" name="nama_kelas"
                    value="{{ old('nama_kelas', $data->nama_kelas) }}" placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Nama Kelas</label>
                <!-- error message untuk title -->
                @error('nama_kelas')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <textarea class="form-control" id="floatingInput" name="deskripsi" placeholder="name@example.com"> {{ old('deskripsi', $data->deskripsi) }}"</textarea>
                <label class="mx-2" for="floatingInput">Deskripsi</label>
                @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="number" class="form-control" id="floatingInput" name="harga"
                    value="{{ old('harga', $data->harga) }}" placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Harga</label>
                @error('harga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="number" class="form-control" id="floatingInput" name="kuota"
                    value="{{ old('kuota', $data->kuota) }}" placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Kuota</label>
                @error('kuota')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="file" class="form-control" id="floatingInput" name="gambar_kelas"
                    value="{{ old('harga', $data->gambar_kelas) }}" placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Gambar_Kelas</label>
                @error('harga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="row">
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <button class="btn btn-primary" type="submit"><a> Submit </a></button>
                    </div>
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <a class="btn btn-danger" href="{{ route('data-kelas') }}">Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
