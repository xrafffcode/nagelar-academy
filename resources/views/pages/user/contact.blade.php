<x-user-layout title="Kontak Kami" active="contact">
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

            @media screen and (max-width: 1098px) {
                .hero-banner-one {
                    padding-top: 50px;
                }
            }

            .pb-50 {
                padding-bottom: 50px;
            }

            .pt-100 {
                padding-top: 100px;
            }

            .pb-100 {
                padding-bottom: 100px;
            }

            .pricing .item-pricing {
                background: #fff;
                border-radius: 16px;
                padding: 30px;
            }

            .pricing .item-pricing .icon {
                height: 70px;
                width: 70px;
            }

            .pricing .item-pricing .title {
                color: #34364a;
                font-size: 26px;
                font-weight: 700;
            }
        </style>
    @endpush


    <section class="hero-banner-one pt-100 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h1 class="header-title mt-5">
                        Kami akan membantu<br class="desktop"> anda!
                    </h1>
                    <p class="subtitle my-5">
                        Hubungi kami melalui salah satu channel <br class="desktop"> yang telah kami sediakan di bawah
                    </p>
                </div>
                <div class="col-lg-6 text-end col-12 illustration-holder">
                    <img src="{{ asset('assets/frontend/image/Saly-10.svg') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <div class="section pb-100">
        <div class="container">
            <div class="row mt-5 pricing item-roadmap-master">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="item-pricing">
                        <img src="https://buildwithangga.com/themes/front/images/ic_konsultasi.svg" class="icon"
                            alt="icon-chat">
                        <h2 class="title mt-5 lh-base">
                            Kontak Melalui <br class="desktop"> WhatsApp
                        </h2>
                        <a class="btn bgTheme p-2 w-100 border-12 text-white mt-5" rel="noopener noreferrer"
                            target="_blank"
                            href="https://api.whatsapp.com/send?phone=085325483259&text=Halo%20Admin,%20saya%20butuh%20bantuan">Chat
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
