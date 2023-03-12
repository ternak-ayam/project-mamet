@extends('dashboard')
@section('content')
    <form action="{{ route('update-gambar-kegiatan-kelas', $data->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Edit Gambar Kegiatan Kelas</p>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
            <label class="mx-2">Nama Kelas</label>
                <select class="form-control" name="jenis_kelas_id" >
                    <option value="{{ old('jenis_kelas_id', $data->jenis_kelas_id) }}" >{{ old('jenis_kelas_id', $data->nama_kelas->jenis_kelas) }}</option>
                </select>
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="file" name="images[]"  class="form-control" accept="image/*" id="images">
                @if ($errors->has('images'))
                  @foreach ($errors->get('images') as $error)
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $error }}</strong>
                  </span>
                  @endforeach
                @endif
            </div>
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <div class="images-preview-div"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="row">
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <button class="btn btn-primary" type="submit"><a> Submit </a></button>
                    </div>
                    <div class="d-grid gap-1 col-6 col-md-6 ">
                        <a class="btn btn-danger" href="{{ route('detail-gambar-kegiatan-kelas', $data->jenis_kelas_id) }}">Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <style>
        .invalid-feedback {
              display: block;
            }
            .images-preview-div img
            {
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
                             $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
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
