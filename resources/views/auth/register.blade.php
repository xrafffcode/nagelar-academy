<x-auth-layout title="Daftar">
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('assets/frontend/image/nagelar.png') }}" alt="Logo" /></a>
                    </div>
                    <h1 class="auth-title">Registrasi</h1>
                    <p class="auth-subtitle mb-5">
                        Silahkan buat akun dengan mengisi data diri anda
                    </p>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative  mb-4">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text"
                                class="form-control form-control-xl @error('full_name') is-invalid @enderror"
                                placeholder="Masukan nama lengkap mu" name="full_name" value="{{ old('full_name') }}" />
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group position-relative  mb-4">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select
                                class="form-select form-control form-control-xl  @error('gender') is-invalid @enderror"
                                name="gender">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" @if (old('gender') == 'Laki-Laki') selected @endif>Laki Laki
                                </option>
                                <option value="Perempuan" @if (old('gender') == 'Perempuan') selected @endif>Perempuan
                                </option>

                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group position-relative  mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text"
                                class="form-control form-control-xl @error('email') is-invalid @enderror"
                                placeholder="Masukan email kamu" name="email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group position-relative  mb-4">
                            <label for="password" class="form-label">Password </label>
                            <input type="password"
                                class="form-control form-control-xl  @error('password') is-invalid @enderror"
                                placeholder="Password" name="password" />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative  mb-4">
                            <label for="password" class="form-label">Konfirmasi Password </label>
                            <input id="password-confirm" type="password" class="form-control form-control-xl"
                                name="password_confirmation" autocomplete="new-password"
                                placeholder="Konfirmasi Password">
                        </div>

                        <button class="btn btn-primary btn-block btn-auth shadow-lg mt-5" type="submit">
                            Daftar
                        </button>
                    </form>
                    <div class="text-center mt-5 text-auth fs-4">
                        <p class="text-gray-600">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-bold">Masuk</a>.
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

    @push('addonStyle')
        <style>
            .form-check-input:checked {
                background-color: #4F94D7;
                border-color: #4F94D7;
            }

            .text-auth .text-gray-600 a {
                color: #4F94D7;
            }

            .text-auth .text-gray-600 a:hover {
                color: #4d88c3;
            }

            .text-auth p a {
                color: #4F94D7;
            }

            .text-auth p a:hover {
                color: #4d88c3;
            }
        </style>
    @endpush
</x-auth-layout>
