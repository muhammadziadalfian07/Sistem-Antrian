@extends('layouts.master')

@section('title')
Edit User
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mt-3">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('error')!!}
            </div>
            @endif

            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                    id="" value="{{ $user->name }}">
                    <p class="text-danger">{{$errors->first('name')}}</p>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}"
                    id="" value="{{ $user->email }}">
                    <p class="text-danger">{{$errors->first('email')}}</p>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" type="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" id="">
                    <p class="text-danger">{{$errors->first('password')}}</p>
                    <p class="text-danger">Biarkan Kosong! jika tidak ingin mengganti password</p>
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger"><i class="fas fa-backward"></i>
                    Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
