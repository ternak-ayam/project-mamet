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
                                            <h5 class="card-title text-uppercase mb-0">LAPORAN PESERTA KELAS</h5>
                                            <form action="{{ route('cari-peserta-kelas') }}" method="GET">
                                                <div class="input-group mt-5  justify-content-between">
                                                    <div class="w-50 d-flex">
                                                    <button type="button" class="btn btn-success rounded "><a
                                                            class="text-white text-decoration-none"
                                                            href="{{ route('admin-export-user') }}">  <i
                                                            class="fa fa-download"></i>Export Member</a></button>
                                                    <button type="button" class="btn btn-success rounded ms-4"><a
                                                            class="text-white text-decoration-none"
                                                            href="{{ route('admin-export-nonuser') }}">  <i
                                                            class="fa fa-download"></i>Export Non Member</a></button>
                                                    </div>
                                                    <div class="w-50 d-flex">
                                                        <input type="text" name="keyword"
                                                            value="{{ request()->keyword }}" class="form-control "
                                                            placeholder="Search...">
                                                        <button class="btn btn-color">Search</button>
                                                        <select name="filter" class="ms-4 form-control" onchange="this.form.submit()">
                                                            <option @if(request()->filter == 'all') selected @endif value="all">All</option>
                                                            <option @if(request()->filter == 'user') selected @endif value="user">Member</option>
                                                            <option @if(request()->filter == 'nonuser') selected @endif value="nonuser">Non Member</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative; height: 700px">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #B693FB;">
                                                    <tr class="font">
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Alamat</th>
                                                        <th scope="col">No Telp</th>
                                                        <th scope="col">Nama Orang Tua</th>
                                                        <th scope="col">Role</th>
                                                        <th scope="col">Kelas Yang Mengikuti</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($datauser as $item)
                                                        <tr>
                                                            <td class="pl-4 text-center">{{ $i++ }}</td>
                                                            <td class="text-center">
                                                                <span class="text-muted">{{ $item->name }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-muted">{{ $item->email }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-muted">{{ $item->alamat }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-muted">{{ $item->no_telp }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-muted">{{ $item->nama_orangtua }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-muted">
                                                                    @if ($item->role == 'user')
                                                                        <span class="text-muted">Member</span>
                                                                    @elseif($item->role == 'nonuser')
                                                                        <span class="text-muted">Non Member</span>
                                                                    @endif 
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{ route('detail-peserta-kelas', $item->id) }}">
                                                                    <button type="button" class="btn btn-info"><i
                                                                            class="fa-solid fa-landmark"></i></button>
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
        .melengkung {
            border-radius: 20px;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        html,
        body,
        .intro {
            height: 100%;
        }

        .btn-color {
            color: #f6f6f7 !important;
            background-color: #9d6efc !important;
            border-color: #8C52FF !important;
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
            max-width: 100% !important;
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

        .font {
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
