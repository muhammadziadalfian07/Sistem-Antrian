<section id="banner" class="banner">
    <div class="bg-color">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#"><img src="{{ asset('medilab/img/logo.png') }}"
                                class="img-responsive" style="width: 140px; margin-top: -16px;"></a> -->
                    </div>
                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#banner">Beranda</a></li>
                            <li class="active"><a href="#antrian">Antrian</a></li>
                            <li class="active"><a href="#about">Cara Daftar</a></li>
                            <li class="active"><a href="#doctor">Dokter</a></li>
                            <li class="active"><a href="#contact">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="banner-info">
                    <!-- <div class="banner-logo text-center">
                        <img src="{{ asset('medilab/img/logo.png') }}" class="img-responsive">
                    </div> -->
                    <div class="banner-text text-center">
                        <h1 class="white">SELAMAT DATANG</h1>
                        <h3 class="white"> “ Friendly And Caring Clinic ” </h3>
                        <p>Merupakan komitmen mewujudkan Klinik Mata yang benar-benar nyaman, sejuk, penuh keramahan
                            dalam pelayanan, dan menghadirkan nuansa yang menunjang kesembuhan pasien</p>
                    </div>
                    <div class="overlay-detail text-center">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#exampleModal"><i class="fa fa-user-plus"></i>
                            Daftar</button>
                        @if (!empty($pasien))
                        <a href="{{ route('pasien.cetak',$pasien->id) }}" class="btn btn-primary mt-5 btn-lg"
                            tabindex="0" data-toggle="tooltip" data-placement="bottom"
                            title="Pastikan Anda Mendaftar Terlebih Dahulu sebelum mencetak">
                            cetak</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
