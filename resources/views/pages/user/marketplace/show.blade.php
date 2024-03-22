<x-user-layout title="{{ $product->title }}" active="marketplace">


    @push('addonStyle')
        <style>
            body {
                background: #dae3ec !important;
            }

            .profil-name {
                color: #131313 !important;
            }

            .navbar-light .navbar-nav .nav-link {
                color: rgba(19, 19, 19, 0.6);

            }

            .navbar .navbar-nav a:hover.btn-signup {
                color: white !important;
            }

            .navbar .navbar-nav a:hover {
                color: #131313 !important;
            }

            .navbar .navbar-nav .active {
                color: #131313 !important;
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
                box-shadow: 0 0 5px #3ECAB0;
                color: white !important
            }

            .nav-pills .nav-link {

                border: 0;
                border-radius: 0.25rem;
                color: rgba(255, 255, 255, 0.6);
            }

            .navbar-expand-lg.scrolled .nav-link.active {
                color: #131313 !important;
            }

            .articel .title {
                font-weight: bold;
                font-size: 2.25rem;
                line-height: 150%;
                /* or 78px */


                color: #131313;
            }


            .articel .thumbnail {
                width: 100%;
                height: 597px;
                object-fit: cover;
                border-radius: 8px
            }

            span.post-date,
            span.post-read,
            span.readingtime {
                color: rgba(0, 0, 0, .54);
            }

            .dot:after {
                content: "\00B7";
                margin-left: 3px;
                margin-right: 3px;
            }

            .navbar-expand-lg {
                background-color: white !important;
                box-shadow: -1.5px 4px 16px rgb(118 126 148 / 20%);
                transition: background-color 200ms linear;
            }

            .articel .content p {
                font-size: 1.25rem;
                line-height: 150%;
                /* or 39px */

                color: #131313;
            }

            @media (max-width: 767px) {
                .articel .thumbnail {
                    height: 200px;
                }
            }

            .card-img-top {
                width: 100%;
                height: 300px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 14px;
            }

            .text-secondary {
                color: rgb(155, 162, 180) !important;
            }


            input,
            input:focus,
            select,
            textarea {
                background: #f2f0ff !important;
            }

            .transaction .transaction-detail {
                padding: 26px 16px !important;
            }

            .login {
                color: rgba(0, 0, 0, .55) !important;
            }
        </style>
    @endpush


    <section class="articel container" style="padding-top: 160px; padding-bottom: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold">
                    <a href="{{ route('home') }}" class="text-decoration-none baseColor" style="font-size: 14px;">Home</a>
                </li>
                <li class="breadcrumb-item fw-bold" aria-current="page">
                    <a href="{{ route('product.index') }}" class="text-decoration-none baseColor"
                        style="font-size: 14px;">Marketplace</a>
                </li>

                <li class="breadcrumb-item fw-bold" aria-current="page">
                    <a href="#" class="text-decoration-none text-base" style="font-size: 14px;">
                        {{ $product->title }}
                    </a>
                </li>
            </ol>
        </nav>
        <div class="row m-0 my-5 justify-content-between">
            <div class="travel-detail col-lg-6 p-0">
                <div class="card border-0 rounded-12 p-lg-2 p-2">
                    <div class="card-body">
                        <div class="travel-title mb-4">
                            <h2 class="fw-bolder baseColor mb-3">
                                {{ $product->title }}
                            </h2>
                            <h4 class="fw-bolder baseColor mb-3">
                                @idr($product->price)
                            </h4>

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <p class="text-secondary"><i class="fas fa-user"></i></p>
                                    <p class="fw-bold text-secondary ms-2">
                                        {{ $product->user->full_name }}
                                    </p>

                                </div>

                            </div>
                        </div>
                        <div class="gallery">
                            @if ($product->galleries->count())
                                <img src="{{ asset('storage/' . $product->galleries->first()->image) }}"
                                    class="img-thumb">
                                <div class="thumbnails d-flex justify-content-between mt-4 w-100">
                                    @foreach ($product->galleries()->paginate(5) as $gallery)
                                        <img src="{{ asset('storage/' . $gallery->image) }}" class="img-mini">
                                    @endforeach
                                </div>
                            @else
                                <img src="{{ asset('images/gallery/default.png') }}" class="img-thumb">
                                <div class="thumbnails d-flex justify-content-between mt-4 w-100">
                                    <img src="{{ asset('assets/gallery/default.jpg') }}" class="img-mini">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="description bg-white mt-5 p-5 rounded-12">
                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary fw-bold px-4 active" id="pills-home-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                aria-controls="pills-home" aria-selected="true">Deskripsi</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary fw-bold px-4" id="pills-contact-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            {!! $product->description !!}
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <h6 class="mb-4 mt-5 text-center text-secondary">No Reviews</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="transaction col-lg-5 p-0 m-lg-0 mt-5">
                <div class="card border-0 rounded-12 mb-5 p-0">
                    <div class="w-100 bgColor text-center py-3 members">
                        <h5 class="text-white fw-bold m-0">Checkout Product</h5>
                    </div>
                    <div class="card-body transaction-detail">

                        <form action="{{ route('product.order', $product->slug) }}" method="POST">
                            @csrf
                            <div class="row align-items-center justify-content-between m-0 p-0 my-2">

                                <div class="col-md-12  mt-md-0 mt-4 p-0">
                                    <div class="form-group">
                                        <label for="duration" class="form-label fw-bold text-base">
                                            <p>Jumlah</p>
                                        </label>
                                        <input type="number" id="total" name="item"
                                            class="form-control py-2 px-3 mt-1 shadow-none text-secondary"
                                            placeholder="Berapa Item?" required="">
                                    </div>
                                </div>
                                <div class="col-md-12  mt-md-4 mt-4 p-0">
                                    <div class="form-group">
                                        <label for="duration" class="form-label fw-bold text-base">
                                            <p>Pesan Untuk Penjual</p>
                                        </label>
                                        <textarea name="transaction_message" id="transaction_message" cols="30" rows="10"
                                            class="form-control py-2 px-3 mt-1 shadow-none text-secondary" placeholder="Pesan Untuk Penjual"></textarea>
                                    </div>
                                </div>
                            </div>
                            @guest
                                <a href="{{ route('login') }}"
                                    class="btn shadow-none w-100 text-center py-3 btn-transaction">
                                    <h5 class="text-white fw-bold m-0">Daftar Atau Masuk Untuk Melanjutkan</h5>
                                </a>
                            @endguest
                            @auth
                                <button type="submit" class="btn shadow-none w-100 text-center p-3 bgTheme">
                                    <h5 class="text-white fw-bold m-0">Pesan Sekarang</h5>
                                </button>
                            @endauth
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </section>


    @push('addonScript')
        <script>
            let galleries = document.querySelector('.thumbnails');
            let galleryThumb = document.querySelector('.img-thumb');
            let galleryMini = Array.from(document.querySelectorAll('.img-mini'));
            galleryMini.filter(e => e.src == galleryThumb.src).map(e => e.classList.add('active'));

            galleries.addEventListener('click', e => {
                if (e.target.className == 'img-mini') {
                    galleryThumb.src = e.target.src;
                    galleryThumb.classList.add('fade');

                    galleryMini.map(e => e.className = 'img-mini');

                    e.target.classList.add('active');

                    setTimeout(() => {
                        galleryThumb.classList.remove('fade');
                    }, 500);
                }
            });
        </script>
    @endpush
</x-user-layout>
