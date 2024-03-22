<x-user-layout title="Payment" active="payment">
    @push('addonStyle')
        <style>
            body {
                background: #dae3ec !important;
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

            .profil-name {
                color: #131313
            }

            .hero {
                background: none !important;

                margin-bottom: -33px !important;
                height: 80vh !important;
            }

            .hero p {
                font-weight: 400;
                font-size: 16px;
                color: rgba(19, 19, 19, 0.8);
                margin: 0px !important
            }

            .hero .hero-text {
                color: #34364a;
                font-size: 68px;
                font-weight: 700;
                line-height: 78px;


            }

            .hero .btn-cta {
                background: #4F94D7;
                border-radius: 12px;
                color: white;
                font-weight: 500;
                font-size: 16px;
                line-height: 150%;
                padding: 12px 32px;
                /* identical to box height, or 24px */
            }

            .img-header {
                position: absolute;
                top: 1;
                right: 0px;
                z-index: -1;
            }

            .navbar-expand-lg {
                background-color: white !important;
                box-shadow: -1.5px 4px 16px rgb(118 126 148 / 20%);
                transition: background-color 200ms linear;
            }

            .benefit {
                background: #03173C;
                padding: 20px 0px;
            }



            @media (min-width: 767px) {

                .benefit {

                    padding: 60px 0px;
                }

                .hero {
                    background: none !important;
                    margin-top: 75px;
                    margin-bottom: -33px !important;
                    height: 80vh !important;
                }

            }

            .header-primary {
                color: #34364a;
                font-size: 38px;
                font-weight: 700;
                line-height: 48px;
            }

            .card-container,
            .course-card,
            .course-card-responsive {
                background: #fff;
                border: none;
                border-radius: 14px;
                box-sizing: border-box;
                color: #34364a;
                display: flex;
                flex-direction: column;
                height: 100%;
                padding: 30px;
                position: relative;
                row-gap: 24px;
            }

            .pricing .item-pricing {
                background: #fff;
                border-radius: 16px;
                padding: 30px;
            }

            .course-card .course-detail .course-name,
            .course-card-responsive .course-detail .course-name,
            .line-clamp,
            .line-clamp-1 {
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                display: -webkit-box;
                overflow: hidden;
            }

            .course-card .course-detail .course-name {
                color: #34364a;
                font-size: 20px !important;
                font-weight: 700 !important;
                line-height: 30px;
                min-height: 60px;
                position: relative;
                z-index: 80 !important;
            }

            .course-card .course-footer {
                align-items: baseline;
                display: flex;
                gap: 4px;
                justify-content: space-between;
            }

            .course-card .course-footer .star-rating {
                align-items: flex-start;
                display: flex;
                flex-wrap: wrap;
                gap: 2px;
            }

            @media only screen and (min-width: 768px) and (max-width: 1250px) {
                .course-card .course-footer .star-rating img {
                    width: 20px !important;
                }
            }

            .course-card .course-footer .star-rating img {
                width: 24px;
            }

            .checkout .payment-details .header-title {
                color: #34364a;
                font-size: 16px;
                font-weight: 700;
                margin: 0 0 16px;
            }

            .checkout .payment-details .item {
                margin-bottom: 16px;
            }

            .checkout .payment-details .title {
                color: #34364a;
                float: left;
                font-size: 16px !important;
                font-weight: 400;
                margin: 0;
            }

            .checkout .payment-details .value {
                color: #34364a;
                float: right;
                font-size: 16px;
                font-weight: 400;
                margin: 0;
            }

            .clear {
                clear: both;
            }

            .embed-responsive {
                display: block;
                height: 25vh;
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
                height: 25vh;
            }


            .plyr__video-embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;

            }

            .text-green {
                color: #22c58b !important;
            }

            .border-theme {
                border: 2px solid var(--limeColor);
            }

            .bg-theme-light {
                background-color: #e9fff0d2;
            }
        </style>
    @endpush
    <section class="py-5" style="margin-top: 90px">
        <div class="container">
            <div class="row">
                <div class="text-center col-lg-12">
                    <h1 class="mb-3 header-primary">

                        Pembayaran Berhasil

                    </h1>
                </div>
            </div>
            <div class="mx-auto d-flex align-items-center justify-content-center flex-column">
                <img class="img-fluid" src="{{ asset('assets/frontend/image/succes.svg') }}" alt=""
                    width="400">
                <div class="text-center w-100">


                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ route('profil.myorder') }}" class="nav-link">
                            <button class="btn bgTheme d-inline-flex text-white py-2 rounded-12">
                                Lihat Pesanan
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-user-layout>
