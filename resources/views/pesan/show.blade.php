@extends('layouts.master')

@section('title')
Manajemen Dokter
@endsection

@section('content')
<div class="col-md-12">

    <div class="card mt-5 shadow-lg bg-white rounded">
        <div class="card-header text-center bg-info ">
            Detail Pesan
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <h5>{{ ucfirst($pesan->name) }}</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Subject</label>
                        <h5>{{ $pesan->subject }}</h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <h5><a href="mailto:{{$pesan->email}}">{{$pesan->email}}</a></h5>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label for="">Pesan</label>
                        <p>{{ ucfirst($pesan->message) }}</p>
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
