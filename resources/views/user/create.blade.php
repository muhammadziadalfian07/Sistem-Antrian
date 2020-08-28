@extends('layouts.master')

@section('title')
Tambah User
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mt-3">
        <div class="card-header">
            Tambah User
        </div>
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('error')!!}
            </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                    id="" placeholder="Masukan Nama" value="{{old('name')}}">
                    <p class="text-danger">{{$errors->first('name')}}</p>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                    value="{{old('email')}}">
                    <p class="text-danger">{{$errors->first('email')}}</p>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" id="" value="{{old('password')}}">
                    <p class="text-danger">{{$errors->first('password')}}</p>
                </div>

                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="form-control  {{ $errors->has('password') ? 'is-invalid':'' }}">
                        <option value="">Pilih</option>
                        @foreach ($role as $row)
                        <option value="{{$row->name}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{$errors->first('role')}}</p>
                </div>

                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fas fa-backward"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
