<section id="contact" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ser-title">HUBUNGI KAMI</h2>
                <hr class="botm-line">
            </div>
            <div class="col-md-4 col-sm-4">
                <h3>Info kontak</h3>
                <div class="space"></div>
                <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Jl. H. Lalu Anggrat BA No. 2
                    <br>Kabupaten Lombok Barat, NTB. 83363
                </p>
                <div class="space"></div>
                <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>Keliniktongfang@gmail.com</p>
                <div class="space"></div>
                <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>(+62) 831 294 319 25</p>
            </div>
            <div class="col-md-8 col-sm-8 marb20">
                <div class="contact-info">
                    <h3 class="cnt-ttl">Memiliki Pertanyaan Apa Pun! </h3>
                    <div class="space"></div>
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {!!session('error')!!}
                    </div>
                    @endif
                    <form action="{{ route('pesan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control br-radius-zero {{ $errors->has('name') ? 'is-invalid':'' }}"
                                placeholder="Your Name"/>
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control br-radius-zero {{ $errors->has('email') ? 'is-invalid':'' }}" name="email" 
                                placeholder="Your Email" />
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control br-radius-zero {{ $errors->has('subject') ? 'is-invalid':'' }}" name="subject" 
                                placeholder="subject" />
                            <p class="text-danger">{{$errors->first('subject')}}</p>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control br-radius-zero {{ $errors->has('message') ? 'is-invalid':'' }}" name="message" rows="5" placeholder="Message"></textarea>
                            <p class="text-danger">{{$errors->first('subject')}}</p>
                        </div>

                        <div class="form-action">
                            <button type="submit" class="btn btn-form">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
