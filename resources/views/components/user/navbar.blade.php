<nav class="navbar navbar-expand-lg navbar-light position-fixed top-0 w-100 py-lg-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/frontend/image/nagelar.png') }}" class="mb-1" alt="logo-skillshop" width="80"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <div class="navbar-nav mx-auto mt-2 mt-lg-0 ">
                <a class="nav-link me-4 {{ $active == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link me-4 {{ $active == 'training' ? 'active' : '' }}"
                    href="{{ route('training.index') }}">Pelatihan</a>
                <a class="nav-link me-4 {{ $active == 'articel' ? 'active' : '' }}"
                    href="{{ route('articel.index') }}">Artikel</a>
            </div>
            <div class="navbar-nav">
                @guest
                    <a href="{{ route('login') }}" class="btn text-decoration-none login me-3 shadow-none">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-signup bgTheme text-white  shadow-none">Daftar</a>
                @endguest
                @auth
                    <div class="dropdown mt-1">
                        <button
                            class="btn fw-bold text-white d-flex align-items-center p-0 shadow-none drdwn nav-link dropdown-toggle"
                            type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="profile"
                                class="me-3 avatar">
                            <p class="profil-name">{{ Str::limit(Auth::user()->full_name, 16, '') }}</p>
                        </button>

                    <ul class="dropdown-menu p-0 m-0 border-0 rounded-12 shadow overflow-hidden mt-3"
                            aria-labelledby="dropdownMenu2">
                            <li>
                                <a href="{{ route('profil.dashboard') }}"
                                    class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none">
                                    <p class="me-3"><i class="fas fa-user"></i></p>
                                    <p class="text-sm">Profil</p>
                                </a>

                            </li>
                            <li>
                                <a href="{{ route('profil.myclass') }}"
                                    class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none">
                                    <p class="me-3"><i class="fas fa-clipboard"></i></i></p>
                                    <p class="text-sm">Kelas Saya</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profil.myorder') }}"
                                    class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none">
                                    <p class="me-3"><i class="fas fa-scroll"></i></p>
                                    <p class="text-sm">Pesanan Saya</p>
                                </a>
                            </li>
                            <li>
                                <form action="{{ url('logout') }}" method="post">
                                    @csrf

                                    <button
                                        class="dropdown-item bg-white btn baseColor rounded-0 fw-bold text-white d-flex align-items-center m-0 py-3 shadow-none"
                                        type="submit">
                                        <p class="me-3"><i class="fas fa-sign-out-alt"></i></p>
                                        <p class="text-sm">Logout</p>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>

</nav>
