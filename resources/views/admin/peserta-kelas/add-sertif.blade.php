@extends('dashboard');
@section('content')
    <form action="{{ route('checkout.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Input Sertifikat</p>
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3 " style="margin: 0 auto">
                <input type="text" class="form-control" id="floatingInput"
                    value="{{ old('nama_kelas', $data->user->name) }}" readonly>
                <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                <input type="hidden" name="days_id" value="{{ $data->days_id}}">
                <input type="hidden" name="times_id" value="{{ $data->times_id }}">
                <label class="mx-2" for="floatingInput">Nama User</label>
                <!-- error message untuk title -->
                @error('nama_kelas')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <textarea class="form-control" id="floatingInput" readonly> {{ old('deskripsi', $data->kelas->nama_kelas) }}</textarea>
                <input type="hidden" name="kelas_id" value="{{ $data->kelas_id }}">
                <label class="mx-2" for="floatingInput">Nama Kelas</label>
                @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 col-md-8" style="margin: 0 auto">
                <div class="input-group text-center mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload Sertifikat</label>
                    <input type="file" class="form-control" name="sertifikat">
                    @error('sertifikat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-8 text-center  mb-3" style="margin: 0 auto">
                <div class="text-left" style="text-align: start">
                    <label class="mx-2 mb-2">Bukti Pembayaran</label>
                    <div class="mx-2">
                        <img src="{{ url('storage/bukti_pembayaran/' . $data->bukti_pembayaran) }}" alt="job image"
                            width="150" height="300" title="job image">
                    </div>
                    <input type="hidden" name="bukti_pembayaran" value="{{ $data->bukti_pembayaran }}">
                    @error('harga')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
