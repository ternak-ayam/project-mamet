@extends('dashboard')
@section('content')
    <form action="{{ route('daftar-kelas.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Tambah Kelas</p>
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3 " style="margin: 0 auto">
                <input type="text" class="form-control" id="floatingInput" name="nama_kelas"
                    placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Nama Kelas</label>
                <!-- error message untuk title -->
                @error('nama_kelas')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <textarea class="form-control" id="floatingInput" name="deskripsi" placeholder="name@example.com"></textarea>
                <label class="mx-2" for="floatingInput">Deskripsi</label>
                @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="number" class="form-control" id="floatingInput" name="harga" placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Harga</label>
                @error('harga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="number" class="form-control" id="floatingInput" name="kuota" placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Kuota</label>
                @error('kuota')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="file" class="form-control" id="floatingInput" name="gambar_kelas"
                    placeholder="name@example.com">
                <label class="mx-2" for="floatingInput">Gambar Kelas</label>
                @error('harga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-group col-12 col-md-8  mb-3" style="margin: 0 auto">
                <label class="mx-2">Role</label>
                <select class="form-control" id="name" name="role">

                    @foreach ($role as $item)
                        @if ($data['role'] == $item->role)
                            <option value="{{ $data['role'] }}" selected>{{ $data['role'] }}</option>
                        @else
                        <option value="{{ $item->role }}">{{ $item->role }}</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}
            <div class="col-12 col-md-8  mb-3" style="margin: 0 auto">
                <label class="mx-2">Pilih Hari Kelas</label>
                <select class="form-control" name="days_id">
                    @foreach ($days as $item)
                        <option value="{{ $item->id }}">{{ $item->daysname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-8 mb-3" style="margin: 0 auto">
                <label class="mx-2">Pilih Jam Kelas</label>
                <select class="form-control" name="times_id">
                    @foreach ($times as $item)
                        <option value="{{ $item->id }}">{{ $item->jam_kelas }}</option>
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
                        <a class="btn btn-danger" href="{{ route('dashboard-admin.index') }}">Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
