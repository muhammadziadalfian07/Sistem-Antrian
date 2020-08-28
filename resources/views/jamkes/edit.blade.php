@extends('layouts.master')

@section('title')
Edit Jamkesmas
@endsection

@section('content')
<div class="col-md-10">
    <div class="card mt-3">
        <div class="card-header">
            Edit Jamkesmas
        </div>
        <div class="card-body">
            <form action="{{ route('jamkes.update',$jamkes->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                        id="" value="{{$jamkes->name}}">
                    <p class="text-danger">{{$errors->first('name')}}</p>
                </div>
                <div class="form-group">
                    <label for="">Singkatan</label>
                    <input name="abbreviation" type="text" class="form-control {{ $errors->has('abbreviation') ? 'is-invalid':'' }}"
                        id="" value="{{$jamkes->abbreviation}}">
                    <p class="text-danger">{{$errors->first('abbreviation')}}</p>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fas fa-backward"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
