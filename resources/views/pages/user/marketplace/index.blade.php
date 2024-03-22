<x-user-layout title="Marketplace" active="marketplace">


    @push('addonStyle')
        <style>
            body {
                background: #ffffff !important;
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


            .login {
                color: rgba(0, 0, 0, .55) !important;
            }
        </style>
    @endpush


    <section class="articel container" style="padding-top: 180px; padding-bottom: 80px">
        <img src="{{ asset('assets/frontend/image/banner-marketplace.svg') }}" alt="banner" class="w-100 img-fluid">
        <div class="row">
            @forelse ($products as $product)
                <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card card-training shadow-sm mt-4">
                        <a href="/marketplace/{{ $product->slug }}" class="m-2 mb-1 border-0 position-relative">
                            <div class="card-img-top"
                                style="background-image: url('{{ $product->galleries->count() ? asset('storage/' . $product->galleries->first()->image) : asset('assets/frontend/images/bg-hero-gif.gif') }}');">
                            </div>
                        </a>
                        <a href="/marketplace/{{ $product->slug }}" class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>


                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center my-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <p class="text-warning text-sm me-1"><i class="fas fa-star"></i></p>
                                        @else
                                            <p class="text-secondary-light text-sm me-1"><i class="fas fa-star"></i>
                                            </p>
                                        @endif
                                    @endfor
                                </div>
                                <div class="price">
                                    @idr($product->price)
                                </div>
                            </div>

                        </a>

                    </div>
                </div>

            @empty
                <div class="col-12 text-center p-5 text-danger">
                    <strong>Belum Ada Produk</strong>
                    <br>

                </div>
            @endforelse
        </div>
    </section>


</x-user-layout>
