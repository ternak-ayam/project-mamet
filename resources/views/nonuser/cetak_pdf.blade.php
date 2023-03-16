<!DOCTYPE html>
<html style="font-style: "Lucida Console", "Courier New" , monospace">

<head>
    <title>Bukti Pembayaran </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div style="margin-top:100px">
        <section>
            <div style="margin-left:1rem">
                <div class="row ">
                    <div class="col-md-6">
                        <h3 class="fw-bolder">Bukti Pembayaran</h3>
                        <div class="fs-5 mb-5">
                            <p style="font-size: 9pt; margin-left:5pt">Nama Pelanggan : <span
                                    class="text-muted font-weight-light">{{ $data->user->name }}</span></p>
                            <p style="font-size: 9pt; margin-left:5pt">Alamat Email : <span
                                    class="text-muted font-weight-light">{{ $data->user->email }}</span></p>
                            <p style="font-size: 9pt; margin-left:5pt">Tanggal : <span
                                    class="text-muted font-weight-light">{{ $data->created_at }}</span></p>
                        </div>
                    </div>
                    <div class="col-md-6">


                    </div>
                </div>
            </div>
        </section>
        <section class="px-3">
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                        <td>{{ $data->kelas->deskripsi }}</td>
                        <td>Rp.@convert($data->kelas['harga'])</td>
                    </tr>
                </tbody>
            </table>
            <p style="float: right;">Total <span>Rp.@convert($data->kelas['harga'])</span></p>
        </section>

    </div>
</body>

</html>
