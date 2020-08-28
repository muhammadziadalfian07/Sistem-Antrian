<section id="antrian" class="section-padding">
    <div class="container">
        <div class="row">
           <div class="card">
               <div class="card-body bg-info">
                <div class="col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <br>
                        <br>
                        <div class="card-body text-center">
                            <h1>JUMLAH ANATRIAN</h1>
                        </div>
                        <br>
                        <br>
                        <div class="card-footer text-center">
                            @if(!empty($jumlah))
                            <h1 class="dark">{{$jumlah->count()}}</h1>
                            @else
                            <h1 class="dark">0</h1>
                            @endif
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <br>
                        <br>
                        <div class="card-body text-center">
                            <h1 class="dark">ANTRIAN SAAT INI</h1>
                        </div>
                        <br>
                        <br>
                        <div class="card-footer text-center">
                            @if($antrian)
                            <h1 class="dark">{{$antrian->no_antrian}}</h1>
                            @else
                            <h1 class="dark">0</h1>
                            @endif
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <br>
                        <br>
                        <div class="card-body text-center">
                            <h1>MENUNGGU</h1>
                        </div>
                        <br>
                        <br>
                        <div class="card-footer text-center">
                            @if($tunggu)
                            <h1 class="dark">{{$tunggu->no_antrian}}</h1>
                            @else
                            <h1 class="dark">0</h1>
                            @endif
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
               </div>
           </div>
        </div>
    </div>
</section>