<x-user-layout title="{{ $training->title }}" active="training-show">
    @push('addonStyle')
        <style>
            .navbar-light .navbar-nav .nav-link {
                color: rgba(255, 255, 255, 0.6);
            }

            .navbar .navbar-nav a:hover.btn-signup {
                color: white !important;
            }

            .navbar .navbar-nav a:hover {
                color: #ffffff !important;
            }

            .dropdown .dropdown-menu li a:hover {
                color: #000000 !important;
            }

            .navbar .navbar-nav .active {
                color: #ffffff !important;
            }

            .bgTheme {
                background: #4F94D7 !important;
            }

            .navbar .btn-signup,
            .navbar-expand-lg .login {
                border-radius: 12px;
                padding: 7.6px 32px 8px 32px;
                color: white;
            }


            .nav-pills .nav-link.active {
                background-color: #3ECAB0;
                box-shadow: 0 0 5px #3ECAB0
            }

            .nav-pills .nav-link {
                padding: 1rem 2rem !important;
                border: 0;
                border-radius: 10px;
                color: #696C71;
            }

            .navbar-expand-lg.scrolled .nav-link.active {
                color: #131313 !important;
            }

            .line-text {
                text-align: center;
                width: auto;
            }

            .hero {
                height: 75vh;
            }


            @media (min-width: 986px) {
                .content {
                    padding: 150px 0px;
                }
            }


            @media (min-width: 992px) {
                .hero {
                    height: 90vh !important;
                }


            }




            .hero h1 {
                font-weight: 500 !important;

                line-height: 150%;
                font-size: 48px
            }

            .text-mentor {
                font-weight: 400;
                font-size: 18px;
                color: rgba(255, 255, 255, 0.6);
            }

            .text-mentor span {
                font-weight: 500;
                font-size: 20px;
                color: #FFFFFF !important;
            }

            .img-mentor {
                width: 90px;
                height: 90px;
                background-position: inherit;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 100%;
            }

            .img-thubmnail {
                width: 100%;
                border-radius: 20px;
            }

            .bg-nav {
                background: #EBF3FF;
                border-radius: 12px;
                padding: 15px;
                align-items: center;
                display: flex
            }

            .map {
                width: 100%;
                height: 100%;
                border: 0;
                border-radius: 10px;
                overflow: hidden;
                background: #EBF3FF;

            }

            .card-info {
                background: #EBF3FF;
                border-radius: 14px;
            }

            .card-hero {
                background: #0A2048;
                border-radius: 8px;
                width: fit-content;
                margin: 0 auto;
            }

            .card-hero hr {
                color: #fff;
                border: 1px;
                border-left: 1px solid hsla(200, 10%, 50%, 100);
                height: 100px !important;
                width: 1px;
            }

            .card-info .card-body .caption {
                font-size: 18px;
                font-weight: 400;
                color: #696C71;
            }

            .card-info .card-body .card-title {
                font-weight: 500;
                font-size: 20px;
                color: #131313;

            }

            .card-info .card-body a.btn {
                background: #4F94D7;
                border-radius: 12px;
                padding: 19px 101px;
                font-weight: 500;
                font-size: 20px;
                border: 0px
            }

            .card-info .card-body a.btn:hover {
                background: #3ECAB0;
            }

            .card-info .card-body a.btn:focus {
                box-shadow: 0 0 5px #3ecab0;
            }

            .card-info-detail {
                background-color: white;
                border-radius: 14px;
            }

            .card-info-detail .text-info {
                font-weight: 600;
                color: #4F94D7 !important;
            }

            .card-info-detail .text-info span {
                font-weight: 500;
                color: #696C71;
                font-size: 24px
            }

            .review .avatar {
                width: 50px;
                height: 50px;
                background-position: inherit;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 100%;
            }

            .hr-review {
                background-color: #d5d5d5 !important
            }

            .card-info hr {
                color: #fff;
                border: 1px;
                border-left: 1px solid hsla(200, 10%, 50%, 100);
                height: 100px !important;
                width: 1px;
            }

            .embed-responsive {
                display: block;
                height: 50vh;
                overflow: hidden;
                padding: 0;
                position: relative;
                width: 100% !important;
            }

            .video-iframe {
                border-radius: 16px;
                transition: all .3s;
            }



            .embed-responsive:before {
                content: "";
                display: block;
            }

            .embed-responsive iframe {
                border-radius: 16px;
                width: 100%;
                height: 50vh;
            }


            .plyr__video-embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;

            }
        </style>
    @endpush

    {{-- Hero --}}
    <section class="hero">
        <div class="content container ">
            <div class="row align-items-center container ">
                <div class="col-md-6 mt-5 mt-lg-0">
                    <h1 class="text-white fw-bolder m-0 px-2 display-4">
                        {{ $training->title }}
                    </h1>
                </div>
                <div class="col-md-6 mt-5 mt-lg-0">
                    <div class="d-flex float-lg-end align-items-center mt-sm-5 mt-md-0 mt-lg-0">
                        <div class="img-mentor me-3"
                            style="background-image: url('{{ asset('storage/' . $training->mentor->profile_picture) }}');">
                        </div>


                        <h6 class="text-mentor m-0">Mentor<br><span
                                class="text-secondary text-sm">{{ $training->mentor->full_name }}
                            </span></h6>
                    </div>
                </div>
            </div>
            <div class="card card-hero text-center mt-5 mx-auto d-none d-md-none d-lg-flex">

                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-center gap-5">

                        <div class="d-flex">
                            <h6 class="text-mentor m-0">Rating<br>
                                <br>
                                <span class="text-waring text-sm">
                                    <i class="fas fa-star text-warning me-2"></i>{{ $training->rating }} </span>
                            </h6>
                        </div>
                        <hr>

                        <div class="d-flex">
                            <h6 class="text-mentor m-0">Sistem<br>
                                <br>
                                <span class="text-waring text-sm">
                                    {{ $training->system }}
                                </span>
                            </h6>
                        </div>
                        <hr>

                        <div class="d-flex">
                            <h6 class="text-mentor m-0">Tingkatan<br>
                                <br>
                                <span class="text-waring text-sm">
                                    {{ $training->level }}
                                </span>
                            </h6>
                        </div>
                        <hr>

                        <div class="d-flex">
                            <h6 class="text-mentor m-0">Sertifikat<br>
                                <br>
                                <span class="text-waring text-sm">
                                    <i class="fas fa-check text-success me-2"></i>
                                </span>
                            </h6>
                        </div>
                        <hr>

                        <div class="d-flex">
                            <h6 class="text-mentor m-0">Harga<br>
                                <br>
                                <span class="text-waring text-sm">
                                    @idr($training->price)
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    {{-- End Hero --}}

    <section class="training container mt-5">
        <div class="row">

            <!-- Main Content -->

            <main class="col col-xl-8 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="embed-responsive embed-responsive-16by9 video-iframe ">
                    <div class="plyr__video-embed" id="player">
                        <iframe src="{{ $training->trailer_url }}" allowfullscreen="" allowtransparency=""
                            allow="autoplay" frameborder="0" id="__existing-iframe-id"
                            data-gtm-yt-inspected-5="true"></iframe>
                    </div>
                </div>
                <div class="bg-nav mt-3">
                    <ul class="nav nav-pills  gap-5 " id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-description" type="button" role="tab"
                                aria-controls="pills-description" aria-selected="true">Deskripsi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-location-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-location" type="button" role="tab"
                                aria-controls="pills-location" aria-selected="false">Lokasi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-review" type="button" role="tab"
                                aria-controls="pills-review" aria-selected="false">Review</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content mt-5" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                        aria-labelledby="pills-description-tab" tabindex="0">
                        {!! $training->description !!}
                    </div>
                    <div class="tab-pane fade show" id="pills-location" role="tabpanel"
                        aria-labelledby="pills-location-tab" tabindex="0">
                        @if ($training->system == 'Offline')
                            {!! $training->address !!}
                            <div class="map p-4 mt-3">
                                <p class="text-center text-black fw-bold"><span class="me-2"><i
                                            class="fas fa-map-marker-alt"></i></span>Lokasi</p>
                                <div class="ratio mt-3" style="height: 280px">
                                    <iframe src="{{ $training->map_location }}" class="border-0 rounded-12"
                                        allowfullscreen="" loading="lazy"></iframe>

                                </div>
                            </div>
                        @else
                            <div class="col-12 text-center">
                                <strong>Pelatihan Ini Online</strong>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade show" id="pills-review" role="tabpanel"
                        aria-labelledby="pills-review-tab" tabindex="0">
                        <ul style="padding-left: 0px !important">
                            @forelse ($reviews as $review)
                                <li class="review d-flex align-items-center gap-3 mt-3">

                                    <img src="{{ asset('storage/' . $review->user->profile_picture) }}" alt=""
                                        class="avatar">

                                    <div class="review-content">
                                        <h6 class="name m-0">{{ $review->user->full_name }}</h6>
                                        <p class="text-sm text-muted">{{ $review->created_at->diffForHumans() }}</p>
                                        <p class="text">{{ $review->review }}</p>
                                    </div>
                                </li>
                                <hr class="hr-review">
                            @empty
                                <li class="d-flex align-items-center gap-3 mt-3">
                                    <div class="col-12 text-center">
                                        <strong>Belum Ada Review</strong>
                                    </div>
                                </li>
                            @endforelse

                        </ul>
                    </div>
                </div>
            </main>

            <!-- ... end Main Content -->

            <aside class="col col-xl-4 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card card-info border-0 mt-sm-5 mt-lg-0 ">
                    <div class="card-body p-4 ">
                        <h5 class="card-title">Info Pelatihan</h5>

                        <p class="caption mt-4 text-center">{{ $training->training_info }}</p>
                        @auth
                            @if ($ht != null)
                                <a href="/training-playing/{{ $training->slug }}" class="btn btn-primary mt-5 w-100 ">
                                    Lanjutkan Pelatihan
                                </a>
                            @else
                                <a href="/checkout/{{ $training->slug }}" class="btn btn-primary mt-5 w-100 ">
                                    Join Pelatihan
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary mt-5 w-100 ">
                                Masuk Untuk Melanjutkan
                            </a>
                        @endauth
                    </div>
                </div>
            </aside>


        </div>
    </section>


    @push('addonScript')
        <script>
            let slideIndex = 1;

            $nav.toggleClass('scrolled', $(this).scrollTop() > $hero.height());
            $(function() {
                $(document).scroll(function() {
                    $nav.toggleClass('scrolled', $(this).scrollTop() > $hero.height());
                });
            });
        </script>
    @endpush
</x-user-layout>
