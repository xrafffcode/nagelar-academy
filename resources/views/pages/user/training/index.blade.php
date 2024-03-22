<x-user-layout title="Pelatihan" active="training">
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
                left: 20%;
                top: 50%;
            }

            .line-text p.text-white::after {
                content: " ";
                position: absolute;
                border-bottom: 1px solid #3ECAB0;

                width: 100px;
                right: 20%;
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

            .card-img-top {
                width: 100%;
                height: 250px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 14px;
            }

            @media (min-width: 756px) {
                .hero {
                    height: 75vh !important;
                }

                .card-img-top {

                    height: 180px !important;

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
        </style>
    @endpush

    {{-- Hero --}}
    <section class="hero text-center d-flex align-items-center justify-content-center ">
        <div class="content">
            <div class="line-text">
                <p class="text-white">
                    Hadir untuk anda
                </p>
            </div>
            <h1 class="text-white fw-bolder m-0 px-2 display-4">
                Tempat Pelatihan Terbaik <br> Untuk Meningkatkan Keterampilan
            </h1>
            <form action="" method="GET" class="search-class container mt-5">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pelatihan.."
                        aria-label="Cari Pelatihan.." aria-describedby="button-addon2">
                    <div class="right-button">
                        <button class="btn btn-primary " type="button" id="button-addon2">Cari</button>
                    </div>
                </div>

            </form>
            <ul class="nav nav-pills mx-auto justify-content-center gap-3 mt-4" id="pills-tab" role="tablist">
                @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="pills-{{ $category->slug }}-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-{{ $category->slug }}" type="button"
                            role="tab" aria-controls="pills-{{ $category->slug }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $category->name }}
                        </button>
                    </li>
                @endforeach
            </ul>

        </div>

    </section>
    {{-- End Hero --}}

    {{-- Training --}}

    <section class="training container mt-5">
        <div class="tab-content" id="pills-tabContent">

            @foreach ($categories as $category)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pills-{{ $category->slug }}"
                    role="tabpanel" aria-labelledby="pills-{{ $category->slug }}-tab" tabindex="0">
                    <div class="row ">
                        @foreach ($category->training as $training)
                            <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card card-training shadow-sm mt-5">
                                    <a href="/pelatihan/{{ $training->slug }}"
                                        class="m-2 mb-1 border-0 position-relative">
                                        <div class="card-img-top"
                                            style="background-image: url('{{ asset('storage/' . $training->thumbnail) }}');">
                                        </div>
                                    </a>
                                    <a href="/pelatihan/{{ $training->slug }}" class="card-body">
                                        <h5 class="card-title
                                        ">
                                            {{ $training->title }}</h5>
                                        <p>System: @if ($training->system == 'Offline')
                                                <span class="off">Offline</span>
                                            @endif
                                            @if ($training->system == 'Online')
                                                <span class="on">Online
                                                </span>
                                            @endif
                                        </p>

                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="d-flex align-items-center my-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $training->rating)
                                                        <p class="text-warning text-sm me-1"><i class="fas fa-star"></i>
                                                        </p>
                                                    @else
                                                        <p class="text-secondary-light text-sm me-1"><i
                                                                class="fas fa-star"></i>
                                                        </p>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div class="price">
                                                @idr($training->price)
                                            </div>


                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

    </section>
    {{-- End Training --}}

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
