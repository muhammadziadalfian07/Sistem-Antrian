<!DOCTYPE html>
<html lang="en">

<head>
    @include('landing.head')
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
   
    <!--banner-->
    @include('landing.banner')
    <!--/ banner-->
    <!--cta-->
    @include('landing.panel')
    <!--cta-->
    <!--about-->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="section-title">
                        <h2 class="head-title lg-line">Tata Cara Mendaftar</h2>
                        <hr class="botm-line">
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div style="visibility: visible;" class="col-sm-9 more-features-box">
                        <div class="more-features-box-text">
                            <div class="more-features-box-text-icon"> <i class="fa  fa-check-circle-o"
                                    aria-hidden="true"></i> </div>
                            <div class="more-features-box-text-description">
                                <h3>Tekan Tombol Daftar</h3>
                                <p>Pastikan kamu meng-klik tombol <b>Daftar</b> layar di monitor. kalau kamu punya asuransi atau jaminan
                                    kesehatan, pakai aja, biaya periksa jadi murah. </p>
                            </div>
                        </div>
                        <div class="more-features-box-text">
                            <div class="more-features-box-text-icon"> <i class="fa fa-files-o" aria-hidden="true"></i>
                            </div>
                            <div class="more-features-box-text-description">
                                <h3>Cetak Nomor Antrian</h3>
                                <p> Setelah kamu mendaftar, Klik tombol <b>Cetak</b> yang ada di layar monitor untuk mendaptkan 
                                    nomor antrian.</p>
                            </div>
                        </div>
                        <div class="more-features-box-text">
                            <div class="more-features-box-text-icon"> <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            </div>
                            <div class="more-features-box-text-description">
                                <h3>Tunggu Di Panggil</h3>
                                <p> setelah dipanggil masuk ruangan, kamu diperiksa. ceritakan semua keluhan dan
                                    keperluanmu dateng ke <b>klinik Mata TongFang</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ about-->

    <!--doctor team-->
    @include('landing.dokter')
    <!--/ doctor team-->

    <!--contact-->
    @include('landing.kontak')
    <!--/ contact-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan Daftar</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pasien.daftar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Masukan Nama Anda">
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="">Dokter</label>
                                <select name="dokter_id" class="form-control {{ $errors->has('dokter_id') ? 'is-invalid':'' }}">
                                    <option selected>Pilih</option>
                                    @foreach ($dokter as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                    <p class="text-danger">{{ $errors->first('dokter_id') }}</p>
                                </select>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="">Jamkesmas</label>
                                <select name="jamkes_id" class="form-control {{ $errors->has('jamkes_id') ? 'is-invalid':'' }}">
                                    <option selected>Pilih</option>
                                    @foreach ($jamkes as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                    <p class="text-danger">{{ $errors->first('jamkes_id') }}</p>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" cols="5" rows="5" class="form-control {{ $errors->has('id_jamkes') ? 'is-invalid':'' }}"></textarea>
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                        </div>
        
                        <div class="form-group">
                            <label for="">Keluhan</label>
                            <textarea name="keluhan" cols="5" rows="5" class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}"></textarea>
                            <p class="text-danger">{{ $errors->first('keluhan') }}</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer id="footer">
        <div class="footer-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        © Copyright Zyx Studio. All Rights Reserved
                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer-->
    <script src="{{ asset('medilab/js/jquery.min.js') }}"></script>
    <script src="{{ asset('medilab/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('medilab/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('medilab/js/custom.js') }}"></script>
    <script src="{{ asset('medilab/contactform/contactform.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    {{-- swal --}}
    @include('sweetalert::alert')
   
</body>
