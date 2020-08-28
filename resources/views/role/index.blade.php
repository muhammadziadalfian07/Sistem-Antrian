@extends('layouts.master')

@section('title')
Role
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card mt-3 ">
            <div class="card-header">
                Tambah Role
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {!!session('success')!!}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {!!session('error')!!}
                </div>
                @endif

                <form action="{{route('role.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" name="name" class="form-control {{  $errors->has('name') ? 'is-invalid':''  }}">
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                   <div class="form-group">
                       <button class="btn btn-sm btn-primary">
                           Simpan
                       </button>
                   </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="card-header">
                List Role
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Role</td>
                                <td>Guard</td>
                                <td>Created At</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($role as $e=>$row)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->guard_name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <form action="{{ route('role.destroy',$row->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                    {!!$role->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
