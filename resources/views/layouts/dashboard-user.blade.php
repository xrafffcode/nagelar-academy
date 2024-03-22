<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/image/nagelar.png') }}" type="image/x-icon">


    @include('includes.style')

    @stack('addonStyle')

    <style>
        .swal2-container {
            z-index: 100;
            margin-top: 80px
        }

        .navbar .navbar-nav a:hover {
            color: #131313 !important;
        }
    </style>
</head>

<body>
    <x-user.navbar />
    <div class="container" style="padding-top: 180px; padding-bottom: 80px">

        <div class="row">

            @include('sweetalert::alert')
            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        Profil Kamu
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-side flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('profil.dashboard') }}">Dashboard</a>
                            </li>
                            @hasrole('user')
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'profil' ? 'active' : '' }}"
                                        href="{{ route('profil.edit') }}">Profil Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'my-class' ? 'active' : '' }}"
                                        href="{{ route('profil.myclass') }}">Pelatihan Saya</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ $active == 'my-order' ? 'active' : '' }}"
                                        href="{{ route('profil.myorder') }}">Pesanan Saya</a>
                                </li>
                            @endhasrole
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-9 col-md-8">
                <div class="card border-0 shadow-sm mt-sm-5 mt-lg-0 mt-md-0">
                    <div class="card-header">
                        {{ $title }}
                    </div>
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('includes.script')

    @stack('addonScript')
</body>

</html>
