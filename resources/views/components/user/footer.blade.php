<section class="h-100 w-100" style="box-sizing: border-box; background-color: #03173C; margin-bottom: 0px !important;">
    <div class="footer-2-3 container-xxl mx-auto position-relative p-0" style="font-family: 'Poppins', sans-serif">
        <div class="list-footer">
            <div class="row gap-md-0 gap-3">
                <div class="col-lg-4 col-md-6">
                    <div class="">
                        <div class="list-space">
                            <img src="{{ asset('assets/frontend/image/nagelar.png') }}" alt="footer" width="100">
                        </div>
                        <p class="text-white">
                            Nagelar Academy adalah website aplikasi penyedia kursus pelatihan untuk membantu masyarakat
                            meningkatkan kemampuan dan ketrampilan yang ditujukan untuk membuka peluang
                            usaha
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h2 class="footer-text-title text-white">Tautan</h2>
                    <ul class="list-unstyled">
                        <li class="list-space">
                            <a href="{{ route('home') }}" class="list-menu">Home</a>
                        </li>
                        <li class="list-space">
                            <a href="{{ route('training.index') }}" class="list-menu">Pelatihan</a>
                        </li>
                        <li class="list-space">
                            <a href="{{ route('articel.index') }}" class="list-menu">Artikel</a>
                        </li>
                        <li class="list-space">
                            <a href="{{ route('contact') }}" class="list-menu">Kontak Kami</a>

                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h2 class="footer-text-title text-white">Pelatihan Terbaru</h2>
                    <ul class="list-unstyled">
                        @foreach(\App\Models\Training::latest()->take(3)->get() as $training)
                            <li class="list-space
                            ">
                                <a href="{{ route('training.show', $training->slug) }}" class="list-menu">{{ $training->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h2 class="footer-text-title text-white">Artikel Terbaru</h2>
                    <ul class="list-unstyled">
                        @foreach(\App\Models\Articel::latest()->take(3)->get() as $articel)
                            <li class="list-space
                            ">
                                <a href="{{ route('articel.show', $articel->slug) }}" class="list-menu">{{ $articel->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-color info-footer">

            <div class="mx-auto d-flex flex-column flex-lg-row align-items-center footer-info-space gap-4">
                <div class="d-flex title-font font-medium align-items-center gap-4">

                </div>
                <nav class="mx-auto d-flex flex-wrap align-items-center justify-content-center gap-4">
                    <p style="margin: 0">Copyright © 2023 Zth Team</p>
                </nav>
                <nav class="d-flex flex-lg-row flex-column align-items-center justify-content-center">

                </nav>
            </div>
        </div>
    </div>
</section>
