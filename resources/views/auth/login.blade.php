@extends('layouts.auth')

@section('title')
<title>Login</title>
@endsection

@section('content')
<div class="card-body">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Email</label>
            <input class="form-control py-4 {{ $errors->has('email')  ? 'is-invalid' : '' }} " name="email" type="email"
                placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" />
            <p class="text-danger">{{ $errors->first('email') }}</p>
        </div>

        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Password</label>
            <input class="form-control py-4 {{ $errors->has('password')  ? 'is-invalid' : '' }} " name="password"
                type="password" placeholder="{{ __('Password') }}" />
                <p class="text-danger">{{ $errors->first('password') }}</p>
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="password.html">Forgot Password?</a>
            <button type="submit" class="btn btn-primary">Sig In</button>
    </form>
</div>
@endsection
