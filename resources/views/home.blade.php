@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">MONITOR ANTRIAN <hr> KELINIK <i class="fas fa-eye"></i> TONGFANG <hr></h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body text-center">JUMLAH ANATRIAN SAAT INI</div>
                <div class="card-footer text-center">
                   @if(!empty($jumlah))
                    {{$jumlah->count()}}
                    @else
                    <p>0</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center">MENUNGGU DI PANGGIL</div>
                <div class="card-footer text-center">
                   @if($tunggu)
                    {{$tunggu->no_antrian }}
                    @else
                    <p>0</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body text-center">JUMLAH ANATRIAN TERPANGGIl</div>
                <div class="card-footer text-center">
                   @if(!empty($terpanggil))
                    {{$terpanggil->count()}}
                    @else
                    <p>0</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body text-center">JUMLAH ANATRIAN TERCANCEL</div>
                <div class="card-footer text-center">
                   @if($tercancel)
                    {{$tercancel->count() }}
                    @else
                    <p>0</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
   <div class="row">
    <div class="col-lg">
        <div class="card bg-success text-white card-carousel">
            <div class="card-body text-center">ANTRIAAN SAAT INI</div>
            <div class="card-footer text-center">
                @if($antrian)
                {{$antrian->no_antrian}}
                @else
                <p>0</p>
                @endif
            </div>
        </div>
    </div>
   </div>
</div>



@endsection
