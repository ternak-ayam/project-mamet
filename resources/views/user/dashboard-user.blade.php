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
                        <h5 class="card-title text-uppercase mb-0">Kelas Yang Dibeli</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead class="text-center">
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
                                        Sertifikat
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Cetak Bukti Pembelian
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="pl-4">{{ $i++ }}</td>
                                        <td>
                                            <h5 class="font-medium mb-0">{{ $item->kelas->nama_kelas }}</h5>
                                        </td>
                                        <td class="w-50">
                                            <span class="text-muted">{{ $item->kelas->deskripsi }}</span><br />
                                        </td>
                                        <td>
                                            <span class="text-muted">Rp @convert($item->kelas->harga)</span><br />
                                        </td>
                                        @if ($item->sertifikat == '-')
                                            <td>
                                                <span class="text-muted">Maaf Sertif Belum Tersedia</span><br />
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ route('dashboard-user-sertifikat', $item->id) }}">
                                                    <button type="button"
                                                        class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                        <i class="fa fa-print"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        @endif
                                        <td>
                                            @if ($item->status_pembayaran == '-')
                                                <span class="text-muted">Sabar ya, Bukti Pembayaran sedang
                                                    ditinjau</span><br />
                                            @elseif($item->status_pembayaran == '1')
                                                <button type="button"
                                                    class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                            @else
                                                <span class="text-muted">Bukti Pembayaran Belum Sesuai nih, Upload Ulang
                                                    Yaa!</span><br />
                                                <hr>
                                                <a href="{{ route('dashboard-user-view-update-bp', $item->id) }}">
                                                    <button type="button"
                                                        class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                        <i class="fa fa-pen-to-square"></i>
                                                    </button>
                                                </a>
                                            @endif
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
