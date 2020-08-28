@extends('layouts.master')

@section('title')
Manajemen User
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary mt-3">Tambah Data</a>
       </div>
        <div class="card mt-3 ">
            <div class="card-header">
                Manajemen User
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

                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dataTable">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $e=>$row)
                                <tr>
                                    <td>{{ $e+1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @foreach ($row->getRoleNames() as $role)
                                        <label for="" class="badge badge-info">{{ $role }}</label>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($row->status)
                                            <label for="" class="badge badge-success">Aktif</label>
                                        @else
                                            <label for="" class="badge badge-danger">Suspend</label>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy',$row->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="{{ route('users.roles',$row->id) }}" class="btn btn-info btn-sm"><i class="fas fa-user-secret"></i></a>
                                            <a href="{{ route('users.edit',$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            <a href="{{ route('users.aktifkan',$row->id) }}" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i></a>
                                            <a href="{{ route('users.suspend',$row->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-power-off"></i></a>
                                            
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
