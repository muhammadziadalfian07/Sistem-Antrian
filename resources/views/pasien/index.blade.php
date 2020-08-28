@extends('layouts.master')

@section('title')
    Daftar Pasien
@endsection

@section('content')
<div class="col-md-12">
    <div>
        <form action="{{ route('pasien.truncate') }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <a href="{{ route('pasien.create') }}" class="btn btn-sm btn-primary mt-4"><i class="fas fa-plus"></i> Tambah Data</a>
            <a class="btn btn-success btn-sm mt-4" href="{{ route('pasien.cetak_pdf') }}" target="_blank"><i class="fas fa-print"></i> Cetak PDF</a>
        
            @role('admin')
            <button type="submit" class="btn btn-danger mt-4 btn-sm"><i class="fas fa-trash"></i> Hapus Daftar Pasien</button>
            @endrole
        </form>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Pasien
        </div>

        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('success')!!}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {!!session('error')!!}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable">
                    <thead class="text-md-center">
                        <tr>
                            <td>#</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>Jamkesmas</td>
                            <td>Dokter</td>
                            <td>Keluhan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pasien as $e=>$row)
                        <tr>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->jamkes->name }}</td>
                            <td>{{ $row->dokter->name }}</td>
                            <td>{{ $row->keluhan }}</td>
                            
                            <td>
                                <form action="{{ route('pasien.destroy',$row->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if(!empty($row->antrian->no_antrian))
                                        <a class="btn btn-sm btn-info" href="{{ route('pasien.show',$row->id) }}"><i class="fas fa-eye"></i></a>
                                    @endif
                                    <a class="btn btn-sm btn-warning" href="{{ route('pasien.edit',$row->id) }}"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-md-center" colspan="7">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection