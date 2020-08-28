<section id="doctor" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ser-title">Temui Dokter Kami !</h2>
                <hr class="botm-line">
            </div>
            @foreach ($dokter as $row)
            <div class="col-md-12 col-sm-3 col-xs-6">
                <div class="thumbnail">
               @if ($row->gambar)
                <img src="{{asset('uploads/dokter/'.$row->gambar)}}" alt="{{$row->name}}" class="team-img" width="500px" height="500px">
               @else
               <img src="https://via.placeholder.com/300.png" alt="{{ $row->name }}">
               @endif
                    <div class="caption text-center">
                        <h1>Dr. {{str_limit( $row->name,14)}}</h1>
                        <h3>Dokter {{$row->spesialis}}</h3>
                        <p>Alamat {{ $row->address }} </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>