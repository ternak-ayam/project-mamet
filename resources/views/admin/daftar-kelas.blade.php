@extends('dashboard')
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4 rounded">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Daftar Kelas</h5>
                    </div>
                    <div class="table-responsive">
                        <button type="button" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0 p-2 m-3"><a
                                class="text-white text-decoration-none" href="{{ route('daftar-kelas.create') }}">Tambah
                                Kelas</a></button>
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 text-uppercase font-medium pl-4">
                                        #
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Nama Kelas
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Harga
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Gambar Kelas
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Manage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($datakelas as $item)
                                    <tr>
                                        <td class="pl-4">{{ $i++ }}</td>
                                        <td>
                                            <h5 class="font-medium mb-0">{{ $item['nama_kelas'] }}</h5>
                                        </td>
                                        <td class="w-50">
                                            <span class="text-muted">{{ $item['deskripsi'] }}</span><br />
                                        </td>
                                        <td>
                                            <span class="text-muted">Rp @convert($item['harga'])</span><br />
                                        </td>
                                        <td>
                                            <a href="{{ url('storage/gambar_kelas/' . $item->gambar_kelas) }}"
                                                target="_blank" style="text-decoration:none">
                                                <img src="{{ url('storage/gambar_kelas/' . $item->gambar_kelas) }}"
                                                    alt="job image" width="50" height="100" class="object-fit-cover"
                                                    title="job image">
                                            </a>
                                        </td>
                                        <td>
                                            <form style="height: 50px; width:50px; display:contents;"
                                                onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('daftar-kelas.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('daftar-kelas.edit', $item->id) }}">
                                                <button type="button"
                                                    class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                    <i class="fa fa-edit"></i>
                                                </button>
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
    <style type="text/css">
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

        body {
            background: #edf1f5;
            margin-top: 20px;
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

        .text-muted {
            color: #8898aa !important;
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
@endsection
