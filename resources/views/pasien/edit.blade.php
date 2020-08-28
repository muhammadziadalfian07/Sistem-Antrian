@extends('layouts.master')

@section('title')
    Edit Pasien
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mt-3">
        <div class="card-header">
            Edit Pasien
        </div>

        <div class="card-body">
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('success')!!}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('error')!!}
            </div>
            @endif
            <form action="{{ route('pasien.update',$pasien->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $pasien->name }}">
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Dokter</label>
                        <select name="dokter_id" class="form-control {{ $errors->has('dokter_id') ? 'is-invalid':'' }}">
                            <option selected>Pilih</option>
                            @foreach ($dokter as $row)
                                <option value="{{ $row->id }}" {{ $row->id == $pasien->dokter_id  ? 'selected' :'' }}>
                                    {{ $row->name }}</option>
                            @endforeach
                            <p class="text-danger">{{ $errors->first('dokter_id') }}</p>
                        </select>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="">Jamkesmas</label>
                        <select name="jamkes_id" class="form-control {{ $errors->has('jamkes_id') ? 'is-invalid':'' }}">
                            <option selected>Pilih</option>
                            @foreach ($jamkes as $row)
                                <option value="{{ $row->id }}" {{$row->id == $pasien->jamkes_id ? 'selected' : ''}}
                                    >{{ $row->name }}</option>
                            @endforeach
                            <p class="text-danger">{{ $errors->first('jamkes_id') }}</p>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="address" cols="5" rows="5" class="form-control {{ $errors->has('id_jamkes') ? 'is-invalid':'' }}">{{ $pasien->address }}</textarea>
                    <p class="text-danger">{{ $errors->first('address') }}</p>
                </div>

                <div class="form-group">
                    <label for="">Keluhan</label>
                    <textarea name="keluhan" cols="5" rows="5" class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}">{{ $pasien->keluhan }}</textarea>
                    <p class="text-danger">{{ $errors->first('keluhan') }}</p>
                </div>

                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fas fa-backward"></i> Kembali</a>
                <button class="btn btn-sm btn-primary">Daftar</button>
            </form>
        </div>
    </div>
</div>
@endsection