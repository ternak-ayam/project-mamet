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
                <div class="mask d-flex align-items-center h-auto">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="card-body px-0">
                                            <h5 class="card-title text-uppercase mb-0">Data Peserta Kelas</h5>
                                            <button type="button"
                                                class="btn btn-danger rounded  px-3 mb-2 mb-lg-0 p-2 my-3 "><a
                                                    class="text-white text-decoration-none"
                                                    href="{{ route('peserta-kelas-topmanajemen') }}"> <i
                                                        class="fa fa-arrow-left"></i>Kembali</a></button>
                                            <button type="button"
                                                class="btn btn-success rounded  px-3 mb-2 mb-lg-0 p-2 my-3 "><a
                                                    class="text-white text-decoration-none"
                                                    href="{{ route('kelas-peserta-export', $data->id) }}"> <i
                                                        class="fa fa-download"></i>Export Data Peserta</a></button>
                                        </div>
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative;">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #B693FB;">
                                                    <tr class="font text-center">
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Kelas</th>
                                                        <th scope="col">Deskripsi</th>
                                                        <th scope="col">Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($users as $item)
                                                        <tr>
                                                            <td class="pl-4 text-center">{{ $i++ }}</td>
                                                            <td class="text-center">
                                                                <span
                                                                    class="text-muted">{{ $item->kelas->nama_kelas }}</span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span
                                                                    class="text-muted">{{ \Illuminate\Support\Str::limit($item->kelas->deskripsi, 50, $end = '...') }}</span><br />
                                                            </td>
                                                            <td class="text-center">
                                                                <span
                                                                    class="text-muted">{{ $item->kelas->harga }}</span><br />
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
