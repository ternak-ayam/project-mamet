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
                        <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border-0 text-uppercase font-medium pl-4">
                                        #
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Nama
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Email
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Nama Kelas
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Bukti Pembayaran
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Action
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Status Pembayaran
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Upload Sertif
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="pl-4">{{ $i++ }}</td>
                                        <td>
                                            <h5 class="font-medium mb-0">{{ $item->user->name }}</h5>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $item->user->email }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $item->kelas->nama_kelas }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('storage/bukti_pembayaran/' . $item->bukti_pembayaran) }}"
                                                target="_blank" style="text-decoration:none">
                                                <button type="submit"
                                                    class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form style="height: 50px; width:50px; display:contents;"
                                                action="{{ route('dashboard-admin.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2 check">
                                                    <i class="fa fa-check"></i>
                                                    <input type="hidden" name="status_pembayaran" value="1">
                                                </button>
                                            </form>


                                            <form style="height: 50px; width:50px; display:contents;"
                                                action="{{ route('dashboard-admin.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2 x">
                                                    <i class="fa fa-x"></i>
                                                    <input type="hidden" name="status_pembayaran" value="0">
                                                </button>
                                            </form>

                                        </td>
                                        <td>
                                            @if ($item->status_pembayaran == '1')
                                                <span class="text-muted">Approved</span>
                                            @elseif($item->status_pembayaran == '0')
                                                <span class="text-muted">Declined</span>
                                            @elseif($item->status_pembayaran == '-')
                                                <span class="text-muted">Belum Dicek</span>
                                            @endif
                                        </td>
                                        @if ($item->sertifikat == '-')
                                            <td>
                                                <a href="{{ route('checkout.edit', $item->id) }}">
                                                    <button type="button"
                                                        class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2">
                                                        <i class="fa fa-upload"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ url('storage/sertifikat/' . $item->sertifikat) }}"
                                                    target="_blank" style="text-decoration:none">
                                                    <img src="{{ url('storage/sertifikat/' . $item->sertifikat) }}"
                                                        alt="job image" width="50" height="100" title="job image">
                                                </a>
                                            </td>
                                        @endif
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
@endsection
