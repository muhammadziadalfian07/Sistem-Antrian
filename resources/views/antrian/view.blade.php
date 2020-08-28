@extends('layouts.master')

@section('title')
Antrian
@endsection

@section('content')
@role('admin')
<form action="{{ route('antrian.truncate') }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    @role('admin')
    <button type="submit" class="btn btn-danger mt-2">Reset Nomor Antrian</button>
    @endrole
</form>
@endrole

<div class="row">
    <div class="col-md-6">

        <div class="card mt-3">

            <div class="card-header">
                Antrian Yang sudah Di Panggil
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
                            <td>Nomor Antrian</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($antrian as $e=>$row)
                        <tr>
                            <td>{{$e+1}}</td>
                            <td>{{$row->no_antrian}}</td>
                            <td>
                                <form action="{{route('antrian.destroy',$row->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="3">Tidak Ada Data !</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mt-3">
            <div class="card-header">
                Antrian Yang Diskip
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable">
                        <thead class="text-md-center">
                            <tr>
                                <td>#</td>
                                <td>Nomor Antrian</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skip as $e=>$row)
                            <tr>
                                <td>{{$e+1}}</td>
                                <td>{{$row->no_antrian}}</td>
                                <td>
                                    <form action="{{route('antrian.destroy',$row->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('antrian.tampil',$row->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-phone"></i></a>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="3">Tidak Ada Data !</td>
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
