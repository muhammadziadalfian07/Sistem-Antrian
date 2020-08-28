<html>

<head>
    <title>Cetak Nomor Antrian</title>
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
    <div class="col-md-12">
        <div class="card mt-5 shadow">
            <div class="card-body">
                @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('success')!!}
            </div>
            @endif
                <div class="container">
                    <div class="section text-center">
                        <div class="row">
                            <div class="col-md-8 ml-auto mr-auto">
                                <h1>Klinik <i class="fas fa-eye"></i> TongFang</h1>
                                <h3>Nomor Antrian Anda</h3>
                                <h4>{{$antrian->no_antrian}}</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-8 ml-auto mr-auto">
                            <h1 class="title"></h1>
                        </div>
                        <div class="features">
                            <div class="row">
                                <div class="col-md-3">
                                    <h1><i class="fas  fa-medkit"></i></h1>
                                    <h4 class="info-title">Nama Dokter  </h4>
                                    <h6 align="center">
                                        Dr. {{ucfirst($pasien->dokter->name)}}
                                    </h6>
                                </div>
                                <div class="col-md-3">
                                    <h1><i class="fas  fa-user"></i></h1>
                                    <h4 class="info-title">Nama Pasien</h4>
                                    <h6 align="center">
                                        {{ucfirst($pasien->name)}}
                                    </h6>
                                </div>
                                <div class="col-md-3">
                                    <h1><i class="fas  fa-plus"></i></h1>
                                    <h4 class="info-title">Keluhan</h4>
                                    <h6>{{ucfirst($pasien->keluhan)}}</h6>
                                </div>
                                <div class="col-md-3">
                                    <h1><i class="fas  fa-id-card"></i></h1>
                                    <h4 class="info-title">Pasien</h4>
                                    <h6>{{ucfirst($pasien->jamkes->abbreviation)}}</h6>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ URL::previous() }}" class="btn btn-light"><i class="fas fa-backward"></i> Kembali </a>
                                    <button class="btn button btn-light" onclick="window.print();"><i class="fas fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
