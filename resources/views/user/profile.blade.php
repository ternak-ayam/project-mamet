@extends('dashboard')
@section('content')
    <form action="{{ route('update-profile', $data->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Update Profile</p>
            </div>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show form-group col-12 col-md-8  mb-3 " style="margin: 0 auto" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Nama </label>
                <input class="form-control" type="text" name="name" placeholder="{{ old('name', $data->name) }}"
                    value="{{ old('name', $data->name) }}">
            </div>
            <input type="hidden" name="role" value="{{ old('role', $data->role) }}">
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Email</label>
                <input class="form-control" type="text" name="email" placeholder="{{ old('email', $data->email) }}"
                    value="{{ old('email', $data->email) }}">
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Nama Orang Tua</label>
                <input class="form-control" type="text" name="nama_orangtua"
                    placeholder="{{ old('nama_orangtua', $data->nama_orangtua) }}"
                    value="{{ old('nama_orangtua', $data->nama_orangtua) }}">
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">No Telepon</label>
                <input class="form-control" type="text" name="no_telp" placeholder="{{ old('no_telp', $data->no_telp) }}"
                    value="{{ old('no_telp', $data->no_telp) }}">
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Alamat</label>
                <input class="form-control" type="text" name="alamat" placeholder="{{ old('alamat', $data->alamat) }}"
                    value="{{ old('alamat', $data->alamat) }}">
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
                <label class="mx-2">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Masukkan password disini!">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="row">
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <button class="btn btn-primary" type="submit"><a> Submit </a></button>
                    </div>
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <a class="btn btn-danger" href="{{ route('dashboard-user') }}">Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <style>
        .invalid-feedback {
            display: block;
        }

        .images-preview-div img {
            padding: 10px;
            max-width: 150px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
@endsection
