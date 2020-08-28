@extends('layouts.master')

@section('title')
Manajemen Dokter
@endsection

@section('content')
<div class="col-md-12">

    <div class="card mt-5 shadow-lg bg-white rounded">
        <div class="card-header text-center bg-info ">
            Detail Dokter
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="{{ asset('uploads/dokter/'.$dokter->gambar) }}" 
                        alt="{{$dokter->name}}" width="200px" height="200px">
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Dokter</label>
                        <h5>{{ ucfirst($dokter->name) }}</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <h5>{{ $dokter->tempat_lahir }}</h5>
                        <hr>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <h5>{{ date('l, d F Y' , strtotime($dokter->tanggal_lahir)) }}</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <h5>{{ ucfirst($dokter->address) }}</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <h5>{{ $dokter->jenis_kelamin }}</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Spesialis</label>
                        <h5>{{ $dokter->spesialis }}</h5>
                        <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger mt-3 shadow-lg"><i class="fas fa-backward"></i> Kembali</a>
    </div>
</div>
@endsection
