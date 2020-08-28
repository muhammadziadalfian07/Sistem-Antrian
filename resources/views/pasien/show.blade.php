@extends('layouts.master')

@section('title')
Daftar Pasien
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mt-5 shadow">
        <div class="card-body">
            <div class="container">
                <div class="section text-center">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h1>Klinik <i class="fas fa-eye"></i> Tong Fang</h1>
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
@endsection
