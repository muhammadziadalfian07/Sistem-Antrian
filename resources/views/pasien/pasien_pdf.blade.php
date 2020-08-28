<html>

<head>
    <title>Cetak Laporan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="{{ asset('template/dist/css/styles.css') }}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h1>Laporan Pasien Klinik TongFang</h1>
        <p>Jl. H. Lalu Anggrat BA No. 2, Gerung, Gerung Utara <br> Gerung, Kabupaten Lombok Barat, Nusa Tenggara Bar.
            83363</p>
        <hr>
    </center>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Jamkesmas</td>
                <td>Keluhan</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasien as $e=>$row)
            <tr>
                <td>{{ $e+1 }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->jamkes->name }}</td>
                <td>{{ $row->keluhan }}</td>
            </tr>
            @empty
            <tr>
                <td class="text-md-center" colspan="7">Tidak Ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
