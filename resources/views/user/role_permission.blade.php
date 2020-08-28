@extends('layouts.master')

@section('title')
Role Permission
@endsection



@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mt-3 ">
            <div class="card-header">
               Tambah Hak Akses
            </div>
            <div class="card-body">
                <form action="{{ route('users.add_permission') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">
                            add New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="card-header">
                Set Hak Akses Untuk Role
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

                <form action="{{ route('users.roles_permission') }}" method="GET">
                    <div class="form-group">
                        <label for="">Role</label>
                        <div class="input-group">
                            <select name="role" class="form-control">
                                @foreach ($roles as $value)
                                <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>
                                    {{ $value }}</option>
                                @endforeach
                            </select>
                            <span class="info-group-btn">
                                <button class="btn btn-danger">Check!</button>
                            </span>
                        </div>
                    </div>
                </form>

                {{-- jika $permissions tidak bernilai kosong --}}
                @if (!empty($permissions))
                <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab">Permissions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    @php $no = 1; @endphp
                                    @foreach ($permissions as $key => $row)
                                        <input type="checkbox" 
                                            name="permission[]" 
                                            class="minimal-red" 
                                            value="{{ $row }}"
                                            {{--  CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA CHECKED --}}
                                            {{ in_array($row, $hasPermission) ? 'checked':'' }}
                                            > {{ $row }} <br>
                                        @if ($no++%4 == 0)
                                        <br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pull-right">
                        <button class="btn btn-primary btn-sm">
                         Set Permission
                        </button>
                    </div>
                </form>

                @endif
            </div>
        </div>
        
    </div>

    <div class="mt-2 ml-3">
        <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger "><i class="fas fa-backward"></i> Kembali</a>
    </div>
</div>
@endsection
