@extends('layouts.master')

@section('title')
Antrian
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mt-3">
        <div class="card-header">
            Antrian
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
            {{-- <table class="table table-bordered table-hover" >
                <thead class="text-md-center">
                    <tr>

                        <td>Nomor Antrian</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($antrian))
                    <tr>
                       
                        <td>{{ $antrian->no_antrian }}</td>
            <td>

                @if ($antrian->status == null)
                <span class="badge badge-warning ">Menunggu</span>
                @elseif($antrian->status == 1)
                <span span class="badge badge-success">Terpanggil</span>
                @elseif($antrian->status == 2)
                <span span class="badge badge-danger">Diskip</span>
                @endif


            </td>
            <td>
                @if($antrian->status == 2)
                <a class="btn btn-sm btn-info" href="{{ route('antrian.tampil',$antrian->id) }}"><i
                        class="fas fa-phone"></i> Panggil Ulang</a>
                @else
                <a class="btn btn-sm btn-success" href="{{ route('antrian.tampil',$antrian->id) }}"><i
                        class="fas fa-phone"></i> Panggil</a>
                @endif

                @if($antrian->status == 0)
                <a class="btn btn-sm btn-danger" href="{{ route('antrian.cancel',$antrian->id) }}"><i
                        class="fas  fa-forward"></i> Skip</a>
                @endif
            </td>
            </tr>
            @else
            <tr>
                <td class="text-md-center" colspan="4">Tidak Ada Data</td>
            </tr>
            @endif
            </tbody>
            </table> --}}

            <div class="container">
                <div class="section text-center">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h1>Klinik <i class="fas fa-eye"></i> Tong Fang</h1>
                            <h3>Nomor Antrian Anda</h3>
                            @if (!empty($antrian))
                            <h4>{{$antrian->no_antrian}}</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-8 ml-auto mr-auto">
                        <h1 class="title"></h1>
                    </div>
                    <div class="features">

                        <a class="btn btn-sm btn-success" href="{{ route('antrian.tampil',$antrian->id) }}"><i
                                class="fas fa-phone"></i> Panggil</a>

                        <a class="btn btn-sm btn-danger" href="{{ route('antrian.cancel',$antrian->id) }}"><i
                                class="fas  fa-forward"></i> Skip</a>
                        @else
                        <h4>0</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
