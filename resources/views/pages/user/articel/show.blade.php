<x-user-layout title="{{ $articel->title }}" active="articel-show">


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
        </style>
    @endpush


    <section class="articel container" style="padding-top: 180px; padding-bottom: 80px">
        <h1 class="title">{{ $articel->title }}</h1>
        <p>
            <span class="post-date">
                <time class="post-date">
                    @php
                        $formattedDate = \Carbon\Carbon::parse($articel->created_at)->format('d F, Y');
                    @endphp
                    {{ $formattedDate }}
                </time></span>
            <span class="dot"></span>
            <span class="readingtime">{{ $articel->user->full_name }}</span>
        </p>
        <img src="{{ asset('storage/' . $articel->thumbnail) }}" alt="" class="thumbnail mt-5">
        <div class="content mt-5">
            {!! $articel->content !!}
        </div>
    </section>


</x-user-layout>
