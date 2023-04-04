@extends('dashboard')
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="intro my-5">
            <div class="bg-image h-auto p-5 melengkung" style="background-color: #f5f7fa;">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="card-body px-0">
                                            <h5 class="card-title text-uppercase mb-0">Gambar Kegiatan Kelas</h5>
                                            <button type="button"
                                                class="btn btn-danger rounded  px-3 mb-2 mb-lg-0 p-2 my-3 "><a
                                                    class="text-white text-decoration-none"
                                                    href="{{ route('gambar-kegiatan-kelas') }}"> <i
                                                    class="fa fa-arrow-left"></i>Kembali</a></button>
                                        </div>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #B693FB;">
                                                    <tr class="font">
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Kelas</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($detailgambar as $item)
                                                        <tr>
                                                            <td class="pl-4 text-center">{{ $i++ }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ url('storage/gambar_kegiatan_kelas/' . $item->gambar) }}"
                                                                    target="_blank" style="text-decoration:none">
                                                                    <img src="{{ url('storage/gambar_kegiatan_kelas/' . $item->gambar) }}"
                                                                        alt="job image" width="50" height="100"
                                                                        class="object-fit-cover"  title="job image">
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                                <form style="height: 50px; width:50px; display:contents;"
                                                                    onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                    action="{{ route('delete-gambar-kegiatan-kelas', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="idkelas" value="{{ $item->nama_kelas->id }}">
                                                                    <button type="submit" class="btn btn-danger"><i
                                                                            class="fa fa-trash"></i></button>
                                                                </form>
                                                                <a href="{{ route('edit-gambar-kegiatan-kelas', $item->id) }}">
                                                                    <button type="button" class="btn btn-warning"><i
                                                                            class="fa fa-edit"></i></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style type="text/css">
    .melengkung{
        border-radius: 20px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
        html,
        body,
        .intro {
            height: 100%;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        tbody {
            border-top: none !important;
        }

        thead th {
            color: #fff;
        }

        .card {
            border-radius: .5rem;
            background-color: transparent !important;
        }

        .table-scroll {
            border-radius: .5rem;
        }

        .table-scroll table thead th {
            font-size: 1.25rem;
        }

        thead {
            top: 0;
            position: sticky;
        }

        body {
            background: #edf1f5;
            margin-top: 20px;
        }

        .btn-primary {
            color: #8C52FF !important;
            background-color: #9d6efc !important;
            border-color: #8C52FF !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #8C52FF !important;
            border-color: #8C52FF !important;
        }

        .container {
            max-width: 90% !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }

        .btn-circle.btn-lg,
        .btn-group-lg>.btn-circle.btn {
            width: 50px;
            height: 50px;
            padding: 14px 15px;
            font-size: 18px;
            line-height: 23px;
        }
        .font{
            text-align: center;
        }
        .text-muted {
            color: #8898aa !important;
        }

        .check:hover {
            background-color: #ffff00 !important;
            border-color: #ffff00 !important;
            color: #000000 !important;
        }

        .x:hover {
            background-color: #f44336 !important;
            border-color: #f44336 !important;
            color: #000000 !important;
        }

        .check {
            color: #b2b201 !important;
            border-color: #baba1f !important;
        }

        .x {
            color: #f44336 !important;
            border-color: #f44336 !important;
        }

        [type="button"]:not(:disabled),
        [type="reset"]:not(:disabled),
        [type="submit"]:not(:disabled),
        button:not(:disabled) {
            cursor: pointer;
        }

        .btn-circle {
            border-radius: 100%;
            width: 40px;
            height: 40px;
            padding: 10px;
        }

        .user-table tbody tr .category-select {
            max-width: 150px;
            border-radius: 20px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.1/echarts.min.js"
        integrity="sha512-OTbGFYPLe3jhy4bUwbB8nls0TFgz10kn0TLkmyA+l3FyivDs31zsXCjOis7YGDtE2Jsy0+fzW+3/OVoPVujPmQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
