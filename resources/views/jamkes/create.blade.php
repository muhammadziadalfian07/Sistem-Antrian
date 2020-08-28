@extends('layouts.master')

@section('title')
Tambah Jamkesmas
@endsection

@section('content')
<div class="col-md-10">
    <div class="card mt-3">
        <div class="card-header">
            Tambah Jamkesmas
        </div>
        <div class="card-body">
            <form action="{{ route('jamkes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nama Jamkesmas</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id=""
                        placeholder="Masukan Nama Jamkesmas">
                    <p class="text-danger">{{$errors->first('name')}}</p>
                </div>
                <div class="form-group">
                    <label for="">Singatan Jamkesmas</label>
                    <input name="abbreviation" type="text" class="form-control {{ $errors->has('abbreviation') ? 'is-invalid':'' }}" id=""
                        >
                    <p class="text-danger">{{$errors->first('abbreviation')}}</p>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fas fa-backward"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
