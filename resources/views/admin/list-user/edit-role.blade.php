@extends('dashboard')
@section('content')
    <form action="{{ route('update-role-list-member', $data->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Ganti Role User</p>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Nama </label>
                <input class="form-control" type="text" name="name" placeholder="{{ old('name', $data->name) }}" value="{{ old('name', $data->name) }}"
                    readonly>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Email</label>
                <input class="form-control" type="text" name="email" placeholder="{{ old('email', $data->email) }}" value="{{ old('email', $data->email)}}"
                    readonly>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Nama Orang Tua</label>
                <input class="form-control" type="text" name="nama_orangtua"
                    placeholder="{{ old('nama_orangtua', $data->nama_orangtua) }}" value="{{ old('nama_orangtua', $data->nama_orangtua)}}" readonly>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">No Telepon</label>
                <input class="form-control" type="text" name="no_telp"
                    placeholder="{{ old('no_telp', $data->no_telp) }}" value="{{ old('no_telp', $data->no_telp)}}"  readonly>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Alamat</label>
                <input class="form-control" type="text" name="alamat" placeholder="{{ old('alamat', $data->alamat) }}" value="{{ old('alamat', $data->alamat) }}"
                    readonly>
            </div>
            <div class="form-group col-12 col-md-8  mb-3" style="margin: 0 auto">
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
