@extends('dashboard')
@section('content')
    <form action="{{ route('store-gambar-kegiatan-kelas') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class=" col-12 col-md-8 fs-1 my-3 " style="margin: 0 auto">
                <p>Tambah Gambar Kegiatan Kelas</p>
            </div>
            <div class="form-group col-12 col-md-8  mb-3 " style="margin: 0 auto">
            <label class="mx-2">Pilih Kelas</label>
                <select class="form-control" name="jenis_kelas_id">
                    <option value="1">Painting Class</option>
                    <option value="2">Flower Class</option>
                    <option value="3">Art and Craft Class</option>
                </select>
            </div>
            {{-- <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="file" class="form-control" id="floatingInput" name="gambar_kelas" placeholder="name@example.com" multiple>
                <label class="mx-2" for="floatingInput">Gambar Kelas</label>
                @error('harga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="file" name="images[]" multiple class="form-control" accept="image/*" id="images">
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
            {{-- <div class="field col-12 col-md-8 text-center form-floating mb-3" style="margin: 0 auto">
                <input type="file" id="files" name="files[]" class="form-control" multiple />
            </div> --}}
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
    <style>
        .invalid-feedback {
              display: block;
            }
            .images-preview-div img
            {
                padding: 10px;
                max-width: 150px;
            }
        /* input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        } */
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
        // $(document).ready(function() {
        //     if (window.File && window.FileList && window.FileReader) {
        //         $("#files").on("change", function(e) {
        //             var files = e.target.files,
        //                 filesLength = files.length;
        //             for (var i = 0; i < filesLength; i++) {
        //                 var f = files[i]
        //                 var fileReader = new FileReader();
        //                 fileReader.onload = (function(e) {
        //                     var file = e.target;
        //                     $("<span class=\"pip\">" +
        //                         "<img class=\"imageThumb\" src=\"" + e.target.result +
        //                         "\" title=\"" + file.name + "\"/>" +
        //                         "<br/><span class=\"remove\">Remove image</span>" +
        //                         "</span>").insertAfter("#files");
        //                     $(".remove").click(function() {
        //                         $(this).parent(".pip").remove();
        //                     });

        //                     // Old code here
        //                     /*$("<img></img>", {
        //                       class: "imageThumb",
        //                       src: e.target.result,
        //                       title: file.name + " | Click to remove"
        //                     }).insertAfter("#files").click(function(){$(this).remove();});*/

        //                 });
        //                 fileReader.readAsDataURL(f);
        //             }
        //         });
        //     } else {
        //         alert("Your browser doesn't support to File API")
        //     }
        // });
    </script>
@endsection
