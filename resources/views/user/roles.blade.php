@extends('layouts.master')

@section('title')
Set Role
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mt-3">
            <di class="card-header">
                Set Role
            </di>
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
                <form action="{{ route('users.set_role',$user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>
                                        @foreach ($roles as $row)
                                        <input type="radio" name="role" value="{{ $row }}"
                                        {{$user->hasRole($row) ? 'checked' : ''}}> {{ $row }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div>
                        <button class="btn btn-primary btn-sm float-right">
                            Set Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
