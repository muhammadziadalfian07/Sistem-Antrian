@extends('layouts.master')

@section('title')
Pesan
@endsection

@section('content')
<div class="col-md-10">
    <div class="card mt-3">
        <div class="card-header">
            Pesan
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
                        <td>Email</td>
                        <td>Subjek</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesan as $e=>$row)
                    <tr>
                        <td>{{ $e+1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td><a href="mailto:{{$row->email}}">{{$row->email}}</a></td>
                        <td>{{$row->subject}}</td>
                        <td>
                            <form action="{{ route('pesan.destroy',$row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a class="btn btn-sm btn-info" href="{{ route('pesan.show',$row->id) }}"><i class="fas fa-eye"></i></a>
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
