<x-user-layout title="Nagelar Academy" active="home">
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

            .hero .hero-text {
                color: #34364a;
                font-size: 43px;
                font-weight: 700;
                line-height: 78px;


            }

            @media (min-width: 1280px) {
                .hero .hero-text {
                    color: #34364a;
                    font-size: 56px;
                    font-weight: 700;
                    line-height: 73px;
                }
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

            .card-benefit .card-title {
                font-weight: 500;
                font-size: 24px;
                line-height: 150%;
                /* identical to box height, or 42px */

                text-align: center;

                color: #FFFFFF;
            }


            .card-benefit .card-text {
                font-weight: 500;
                font-size: 16px;
                line-height: 150%;
                /* or 30px */

                text-align: center;

                color: rgba(255, 255, 255, 0.6);
            }

            .card-benefit .card-more {
                font-weight: 500;
                color: #3ECAB0;
            }

            .card-benefit .card-more>span {
                margin-left: 5px
            }

            .benefit .row {
                margin-top: 90px
            }

            section {
                margin-bottom: 0px !important
            }

            .service {
                background: #FFFFFF
            }

            .service .statistic {
                top: 77%;
                width: 60%;
                border-top-right-radius: 16px;
                user-select: none;
                cursor: pointer;
                background: #03173C !important;
                color: #ffff !important;
            }

            @-webkit-keyframes move {
                0% {
                    top: 70px
                }

                50% {
                    top: -55px
                }

                to {
                    top: 70px
                }
            }

            @keyframes move {
                0% {
                    top: 70px
                }

                50% {
                    top: -55px
                }

                to {
                    top: 70px
                }
            }

            @-webkit-keyframes move-down {
                0% {
                    bottom: 70px
                }

                50% {
                    bottom: -55px
                }

                to {
                    bottom: 70px
                }
            }

            @keyframes move-down {
                0% {
                    bottom: 70px
                }

                50% {
                    bottom: -55px
                }

                to {
                    bottom: 70px
                }
            }

            #testimonial-section-v3 {
                background-color: #ffffff;
                height: auto;
                margin: 0px 0 100px;
                overflow: hidden;
            }

            @media(min-width:992px) {
                #testimonial-section-v3 {
                    height: 600px
                }
            }

            #testimonial-section-v3 .header-title {
                font-size: 32px;
                font-weight: 700;
                line-height: 48px !important;
                margin-top: 10px
            }

            #testimonial-section-v3 .subtitle {
                color: #a9a4bc;
                font-size: 16px;
                font-weight: 400;
                line-height: 32px;
                margin-top: 10px
            }

            #testimonial-section-v3 .btn-showcase {
                background-color: #fff;
                border-radius: 100px;
                color: #34364a
            }

            #testimonial-section-v3 .btn-testimonial {
                align-items: center;
                display: flex;
                height: 45px;
                justify-content: center;
                padding: 0;
                width: 170px !important
            }

            #testimonial-section-v3 .testimonial-column {
                -ms-overflow-style: none;
                overflow-y: scroll;
                position: relative;
                scrollbar-width: none
            }

            #testimonial-section-v3 .testimonial-column::-webkit-scrollbar {
                display: none
            }

            #testimonial-section-v3 .testimonial-column:first-child {
                -webkit-animation: move 15s ease-in infinite;
                animation: move 15s ease-in infinite;
                top: 50px
            }

            #testimonial-section-v3 .testimonial-column:last-child {
                -webkit-animation: move-down 15s ease-in infinite;
                animation: move-down 15s ease-in infinite;
                bottom: 50px;
                margin-left: 30px
            }

            #testimonial-section-v3 .testimonial-card {
                background: #dae3ec !important;
                border-radius: 16px;
                padding: 20px;
                width: 330px
            }

            #testimonial-section-v3 .testimonial-card>* {
                text-align: left !important
            }

            #testimonial-section-v3 .testimonial-card:not(:last-child) {
                margin-bottom: 30px
            }

            #testimonial-section-v3 .testimonial-title {
                color: #34364a;
                font-size: 18px;
                font-weight: 700;
                line-height: 27px
            }

            #testimonial-section-v3 .testimonial-description {
                color: #34364a;
                font-size: 16px;
                font-weight: 400;
                line-height: 24px;
                margin-bottom: 20px;
                margin-top: 10px;
                width: auto
            }

            #testimonial-section-v3 .testimonial-profile {
                height: 36px;
                margin-right: 10px;
                width: 36px;
                background-position: inherit;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 100%;
            }

            #testimonial-section-v3 .testimonial-author {
                color: #34364a;
                font-size: 12px;
                font-weight: 700;
                line-height: 18px
            }

            #testimonial-section-v3 .testimonial-role {
                color: #999aa4;
                font-size: 12px;
                font-weight: 300;
                line-height: 18px
            }

            #faq-section-v3 {
                background-color: #f6f8fd
            }

            .text-primary-green {
                color: #47bb8e !important;
            }

            .pb-50 {
                padding-bottom: 50px;
            }

            .pt-50 {
                padding-top: 50px;
            }

            @media only screen and (max-width: 992px) and (min-width: 768px) {
                .hero .row .col-md-12 {
                    text-align: center
                }

                .hero .row .col-md-12 p {
                    width: 100% !important
                }
            }

            @media (max-width: 991px) {
                .student-testimonies {
                    padding: 50px 0 80px 0 !important;
                }

                .testimony-content {
                    font-size: 15px;
                }
            }

            .dcd-light-shadow {
                box-shadow: 2px 4px 12px rgb(0 0 0 / 10%);
            }

            .carousel {
                position: relative;
            }

            #carouselTestimonies .carousel-control-prev {
                left: unset;
                right: 45px;
            }

            #carouselTestimonies .carousel-control-next,
            #carouselTestimonies .carousel-control-prev {
                top: -50px;
                height: 32px;
                width: 32px;
                opacity: unset;
            }

            .carousel-control-next {
                right: 0;
            }

            .carousel-control-next,
            .carousel-control-prev {
                position: absolute;
                top: 0;
                bottom: 0;
                z-index: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 15%;
                padding: 0;
                color: #fff;
                text-align: center;
                background: 0 0;
                border: 0;
                opacity: .5;
                transition: opacity .15s ease;
            }

            .carousel-indicators {
                position: absolute;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 15;
                display: flex;
                justify-content: center;
                padding-left: 0;
                margin-right: 15%;
                margin-left: 15%;
                list-style: none;
            }

            #carouselTestimonies .carousel-indicators li {
                width: 8px;
                height: 8px;
                background: #85898e;
                border-radius: 50%;
                border: none;
            }

            .carousel-indicators li {
                box-sizing: content-box;
                flex: 0 1 auto;
                width: 30px;
                height: 3px;
                margin-right: 3px;
                margin-left: 3px;
                text-indent: -999px;
                cursor: pointer;
                background-color: #fff;
                background-clip: padding-box;
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
                opacity: .5;
                transition: opacity .6s ease;
            }

            .carousel-item {
                position: relative;
                display: none;
                float: left;
                width: 100%;
                margin-right: -100%;
                backface-visibility: hidden;
                transition: transform .6s ease-in-out;
            }

            @media (max-width: 767px) {
                .testimony-content.row {
                    flex-wrap: wrap-reverse;
                }
            }

            #carouselTestimonies .carousel-control-prev-icon {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABFFBMVEUAAAAzM2YrK1UkSUkgQGA5OVUrOVUoQ1EzQE0xPVUuOlEsQ04rQFUpPVIxO04vQkwvPFEuO04tQFMsPlEtPk8sPU4rPFErP1IuPE8uQFIsPk8vQFEtPk4tPVEsP1EsPlAvPU8uQFEtP1AtPVAtP1EsPlAuPlAtPU8tP1AsPk8tPk8sPlAsPVAuPk8tPlEtPlAtPlAtP1EuPlAtPlAuPlEtPVAtPlAsPVAtPlAtPk8tPlAsPlAtPlAtPlAtP1AtPlAtPlAuPlAtP1AtPlAtPlAtPk8tPlAtPlAtPlAtPlAtPlAtPlEtPlAtPlAtPlAsPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlD////NJq3WAAAAWnRSTlMABQYHCAkSExQVFhcYGRobJicoKS0uLzU3ODo8Pj9FRkdISX1+f4CBgoSUlZaXmKmqq629vr/Aw8XHyMnKy8zNzs/Q0tPX293f4uPk5enq6/Dx8vP09fj5+v6o9oGGAAAAAWJLR0RbdLyVNAAAAXVJREFUOMuFU1dbwkAQHBIUhQRFRWkWpEqRoggBBCtNQRAUb/7/D/EhQgIkn/t0ezPf7uzNHrAMOZpvjn5+Rs1cVMZmePOfXMYkr67BzqsvilYs7HE4POF4m5ylnWZcbVAU9o3cVxTUTEWO39g5WS0Z6HLgXyTKgNXddU3bN3zf049bDd46NlVLFWq6jit2XBZjYafLFAB4v4TR392qGoygmCoArlkw8Bc2TTVKzALyRCzn233mq2IiHIixhEve2+HAAy+QZ8wWR4JZNBm2xRFhHR/02OJQOcScEgBgypXQp5X5/T/B3EK1atEwi1Q3RGrIMQ5bRpIZRNmGLeOJZ5AnwmfHOORYAnIs2plVZhaAOhMBa7tDut1Is7tjuTA9JvSV11ixWrk71v4+kNJn1b2Ou2747l0k/gG7wVU81GP/yPSkGkXJZ1qlsmBtxVtnakY+JCKKLCunyUdymlj/wEp2bHg5zngsxpLOM/XhfD6sZ84l4/YXSkpWxAlyJVQAAAAASUVORK5CYII=);
            }

            #carouselTestimonies .carousel-control-next-icon {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAABFFBMVEUAAAAzM2YrK1UkSUkgQGA5OVUrOVUoQ1EzQE0xPVUuOlEsQ04rQFUpPVIxO04vQkwvPFEuO04tQFMsPlEtPk8sPU4rPFErP1IuPE8uQFIsPk8vQFEtPk4tPVEsP1EsPlAvPU8uQFEtP1AtPVAtP1EsPlAuPlAtPU8tP1AsPk8tPk8sPlAsPVAuPk8tPlEtPlAtPlAtP1EuPlAtPlAuPlEtPVAtPlAsPVAtPlAtPk8tPlAsPlAtPlAtPlAtP1AtPlAtPlAuPlAtP1AtPlAtPlAtPk8tPlAtPlAtPlAtPlAtPlAtPlEtPlAtPlAtPlAsPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlAtPlD////NJq3WAAAAWnRSTlMABQYHCAkSExQVFhcYGRobJicoKS0uLzU3ODo8Pj9FRkdISX1+f4CBgoSUlZaXmKmqq629vr/Aw8XHyMnKy8zNzs/Q0tPX293f4uPk5enq6/Dx8vP09fj5+v6o9oGGAAAAAWJLR0RbdLyVNAAAAXZJREFUOMuFU8lWwkAQLBIVgQFXVMANAZVNQUQMILiyKQoCwtT/f4iHSEhC8uzT9FTNdNXrbsAINZ6vf85mn/VcXMVyhPLfNGKYD9rglfSEspGIBTyeQCzZJMeXK2Y8WKO83lzkWwVJzfTJ3jtb+9YvD9rsheeJ6LHis2taK/FjQz+u1njrWVatlKnpOtJseR1sYb3NCwAITaSpfqXhN84RORIArnhtelbn64JRZBZQh9LkD74Xvhn+tuVAwRkfLJUtjEeeIs8EXBkpZlFnDK6MQ1bxxQBcGUH2MaWi+6MlRvoE8Od/gksJYZSoOYoUc5Eacky64jhnBnE2XXE88xjqUG654TscKECOBbdm3TALIDiWB87tjurtxiXb644D02FKH3mNZaeRu+P93wKJLit+O+4t8SM0T8I9tiNWPNphd9e0OBpl0eR2+0byXlhW72JMPqYOhaqKo/MncpSyL7DIDha9HGQCDraUk0y1P532q5kTZXH7CwVWVsTnnK42AAAAAElFTkSuQmCC);
            }

            .login {
                color: rgba(0, 0, 0, .55) !important;
            }
        </style>
    @endpush


    <section class="hero container">
        <div class="row align-items-center py-5">
            <div class="col-lg-7 col-md-12 pb-5 justify-content-center">
                <h1 class="fw-bold hero-text mb-4">
                    Tingkatkan keterampilanmu menjadi lebih baik.
                </h1>
                <p>Berbagai kategori pelatihan dengan mentor yang berpengalaman siap membantu anda untuk berkembang
                    menjadi lebih baik.</p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-cta btn-block mt-4">
                        Daftar
                    </a>
                @endguest
            </div>
            <div class="col-lg-5 mt-3">
                <img src="{{ asset('assets/frontend/image/hero-image.png') }}" alt="bg-header"
                    class="img-fluid float-end d-none d-md-none d-lg-block" width="500">
            </div>
        </div>
    </section>

    @push('addonScript')
        <script src="https://d17ivq9b7rppb3.cloudfront.net/build/commons_script-eb16678ced.js"></script>
    @endpush
</x-user-layout>
