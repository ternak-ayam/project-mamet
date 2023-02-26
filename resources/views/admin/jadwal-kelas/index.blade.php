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
                        <button type="button" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg- p-2 m-3"><a class="text-white text-decoration-none"
                                href="{{ route('admin-export-jadwal') }} " target="_blank">Export Jadwal Kelas</a></button>
                        <form action="{{ route('cari-jadwal-kelas') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="keyword" value="{{ request()->keyword }}" class="form-control "
                                    placeholder="Search...">
                                <button class="btn btn-primary" >Search</button>
                            </div>
                        </form>
                        <table id="table_id" class="display table no-wrap user-table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="border-0 text-uppercase font-medium pl-4">
                                        #
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Nama Kelas
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Hari
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Jam
                                    </th>
                                    <th scope="col" class="border-0 text-uppercase font-medium">
                                        Nama Peserta
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $i = 1; ?>
                                @foreach ($datakelas as $item)
                                    <tr>
                                        <td class="pl-4">{{ $i++ }}</td>
                                        <td>
                                            <span class="text-muted">{{ $item->kelas->nama_kelas }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $item->days->daysname }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $item->times->jam_kelas }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $item->user->name }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $datakelas->links() }} --}}
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
