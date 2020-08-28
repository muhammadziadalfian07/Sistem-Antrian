@extends('layouts.master')

@section('title')
Jamkesmas
@endsection

@section('content')
<div class="col-md-10">
    <div>
        <a href="{{ route('jamkes.create') }}" class="btn btn-sm btn-primary mt-4">Tambah Data</a>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Jaminan Kesehatan
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
            <table class="table table-bordered table-hover" id="dataTable">
                <thead class="text-md-center">
                    <tr>
                        <td>#</td>
                        <td>Nama</td>
                        <td>Singkatan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jamkes as $e=>$row)
                    <tr>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->abbreviation }}</td>
                        <td>
                            <form action="{{ route('jamkes.destroy',$row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a class="btn btn-sm btn-warning" href="{{ route('jamkes.edit',$row->id) }}"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-md-center" colspan="3">Tidak Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
