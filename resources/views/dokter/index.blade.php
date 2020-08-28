@extends('layouts.master')

@section('title')
Manajemen Dokter
@endsection

@section('content')
<div class="col-md-12">
    <div>
        <a href="{{ route('dokter.create') }}" class="btn btn-sm btn-primary mt-4">Tambah Data</a>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Manajemen Dokter
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
                        <td>Foto</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Spesialis</td>
                        <td>Jenis Kelamin</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dokter as $e=>$row)
                    <tr>
                        <td>{{ $e+1 }}</td>
                        <td>
                            @if(!empty($row->gambar))
                            <img src="{{ asset('uploads/dokter/'.$row->gambar) }}" alt="{{ $row->name }}" width="50px"
                                height="50px">
                            @else
                            <img src="http://via.placeholder.com/50x50" alt="{{ $row->name }}">
                            @endif
                        </td>
                        <td>{{ $row->name}}</td>
                        <td>{{ ucfirst($row->address) }}</td>
                        <td>{{ $row->spesialis }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>

                        <td>
                            <form action="{{ route('dokter.destroy',$row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a class="btn btn-sm btn-info" href="{{ route('dokter.show',$row->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-sm btn-warning" href="{{ route('dokter.edit',$row->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-md-center" colspan="6">Tidak Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
