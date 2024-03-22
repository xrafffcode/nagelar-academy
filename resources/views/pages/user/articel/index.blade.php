<x-user-layout title="Artikel" active="articel">


    @push('addonStyle')
        <style>
            body {
                background: #dae3ec !important;
            }


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

            .hero h1 {
                font-weight: 500 !important;
                letter-spacing: 1px;
                line-height: 150%;
            }

            .nav-pills .nav-link.active {
                background-color: #3ECAB0;
                box-shadow: 0 0 5px #3ECAB0
            }

            .nav-pills .nav-link {
                background-color: #0A2048;
                border: 0;
                border-radius: 0.25rem;
                color: rgba(255, 255, 255, 0.6);
            }

            .navbar-expand-lg.scrolled .nav-link.active {
                color: #131313 !important;
            }

            .card-img-top {
                width: 100%;
                height: 180px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 14px;
            }

            .line-text {
                text-align: center;
                width: auto;
            }

            .line-text p.text-white {
                position: relative;
                display: inline-block;
                font-size: 18px;
            }

            .line-text p.text-white::before {
                content: " ";
                position: absolute;
                border-bottom: 1px solid #3ECAB0;

                width: 100px;
                left: 30%;
                top: 50%;
            }

            .line-text p.text-white::after {
                content: " ";
                position: absolute;
                border-bottom: 1px solid #3ECAB0;

                width: 100px;
                right: 30%;
                top: 50%;
            }

            @media (max-width: 756px) {
                .line-text p.text-white::before {
                    content: " ";
                    position: absolute;
                    border-bottom: 1px solid #3ECAB0;
                    ;
                    width: 50px;
                    left: 10%;
                    top: 50%;
                }

                .line-text p.text-white::after {
                    content: " ";
                    position: absolute;
                    border-bottom: 1px solid #3ECAB0;

                    width: 50px;
                    right: 10%;
                    top: 50%;
                }


            }


            .card.card-training {
                min-height: 365px;
                transition: 0.3s;
            }

            .card.card-training:hover {
                box-shadow: 0 0 10px #4F94D7 !important;

            }

            @media (min-width: 756px) {
                .hero {
                    height: 75vh !important;
                }


            }

            .search-class .input-group input {
                background: #0A2048;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 12px !important;
                padding: 16px 20px 16px 32px !important;
                color: white;
            }

            .search-class .input-group input:focus {
                box-shadow: 0 0 5px #4F94D7 !important
            }

            .search-class .input-group .right-button button {
                background: #4F94D7;
                border-radius: 12px !important;
                top: 0.35rem;
                font-weight: 500;
                border: 0px;
            }

            .search-class .input-group .right-button button:hover {
                background: #4886c3;

            }

            .search-class .input-group .right-button button:active {
                box-shadow: 0 0 5px #4F94D7 !important
            }

            .search-class .input-group .right-button button:focus {
                box-shadow: 0 0 5px #4F94D7 !important
            }

            .right-button {
                right: 0 !important;
                position: absolute !important;
                padding: 0 0.6rem;
                z-index: 999;
            }

            .articel-profile {
                height: 36px;
                margin-right: 10px;
                width: 36px;
                background-position: inherit;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 100%;
            }

            .articel-author {
                color: #34364a;
                font-size: 12px;
                font-weight: 700;
                line-height: 18px
            }

            .articel-role {
                color: #999aa4;
                font-size: 12px;
                font-weight: 300;
                line-height: 18px
            }
        </style>
    @endpush

    {{-- Hero --}}
    <section class="hero text-center d-flex align-items-center justify-content-center ">
        <div class="content">
            <div class="line-text">
                <p class="text-white">
                    Artikel
                </p>
            </div>
            <h1 class="text-white fw-bolder m-0 px-2 display-4">
                Kumpulan berbagai artikel yang dapat <br> digunakan untuk bahan belajar anda.
            </h1>



        </div>

    </section>
    {{-- End Hero --}}

    <section class="articel container mt-5">
        <div class="row ">
            @foreach ($articels as $articel)
                <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card card-training shadow-sm mt-5">
                        <a href="/artikel/{{ $articel->slug }}" class="m-2 mb-1 border-0 position-relative">
                            <div class="card-img-top"
                                style="background-image: url('{{ asset('storage/' . $articel->thumbnail) }}');">
                            </div>
                        </a>
                        <a href="/artikel/{{ $articel->slug }}" class="card-body">
                            <p>
                                @php
                                    $formattedDate = \Carbon\Carbon::parse($articel->created_at)->format('d F, Y');
                                @endphp
                                {{ $formattedDate }}
                            </p>
                            <h5 class="card-title mt-2">{{ $articel->title }}</h5>
                            <div class="d-flex justify-content-start align-items-center mt-3">
                                <img class="articel-profile"
                                    src="{{ asset('storage/' . $articel->user->profile_picture) }}" alt="">
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <h4 class="articel-author mb-0">{{ $articel->user->full_name }}</h4>
                                    <h5 class="articel-role mb-0">{{ $articel->user->job }}</h5>
                                </div>
                            </div>



                        </a>
                    </div>
                </div>
            @endforeach
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
