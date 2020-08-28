@extends('layouts.master')

@section('title')
Tambah Dokter
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mt-3">
        <div class="card-header">
            Tambah Dokter
        </div>
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                {!!session('error')!!}
            </div>
            @endif
            <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="">Nama</label>
                        <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                            id="" placeholder="Masukan Nama">
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid':'' }}">
                            <option selected>Pilih</option>
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                            <p class="text-danger">{{$errors->first('jenis_kelamin')}}</p>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-7">
                        <label for="">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{$errors->first('tempat_lahir')}}</p>
                    </div>
                    <div class="col">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid':'' }}">
                        <p class="text-danger">{{$errors->first('tanggal_lahir')}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="address" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" id=""
                        cols="5" rows="5"></textarea>
                    <p class="text-danger">{{$errors->first('address')}}</p>
                </div>
                <div class="form-group">
                    <label for="">Spesialis</label>
                    <input type="text" name="spesialis"
                        class="form-control {{ $errors->has('spesilais') ? 'is-invalid':'' }}">
                    <p class="text-danger">{{$errors->first('spesialis')}}</p>
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="gambar"
                        class="form-control {{ $errors->has('gambar') ? 'is-invalid' : ''}}">
                    <p class="text-danger">{{$errors->first('gambar')}}</p>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fas fa-backward"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
